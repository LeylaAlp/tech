<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use App\Models\KullaniciDetay;
use App\Models\SepetUrun;
use Illuminate\Http\Request;
use App\Models\Kullanici;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Sepet;
use Gloudemans\Shoppingcart\Facades\Cart;


class KullaniciController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('oturumukapat', 'aktiflestir');
    }


    public function giris_form()
    {
        return view('kullanici.oturumac');

    }

    public function giris(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'sifre' => 'required'
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->sifre], $request->has('beni_hatirla'))) {

            $request->session()->regenerate();


            //SEPET
//            $aktif_sepet_id = Sepet::firstOrCreate(['kullanici_id' => Auth::id()])->id;
            $aktif_sepet_id = Sepet::aktif_sepet_id();
            if (is_null($aktif_sepet_id)) {
                $aktif_sepet = Sepet::create(['kullanici_id' => Auth::id()]);
                $aktif_sepet_id = $aktif_sepet->id;
            }
            session()->put('aktif_sepet_id', $aktif_sepet_id);


            if (Cart::count() > 0) {

                foreach (Cart::content() as $cartItem) {
                    foreach ($sepet = SepetUrun::where(['sepet_id' => $aktif_sepet_id, 'urun_id' => $cartItem->id])->get() as $adet) {
                        SepetUrun::updateOrCreate(
                            ['sepet_id' => $aktif_sepet_id, 'urun_id' => $cartItem->id],
                            ['adet' => $adet->adet + $cartItem->qty, 'fiyati' => $cartItem->price, 'durum' => 'Beklemede']
                        );
                    }
                }
            }


            Cart::destroy();
            $sepetUrunler = SepetUrun::with('urun')->where('sepet_id', $aktif_sepet_id)->get();
            foreach ($sepetUrunler as $sepetUrun) {
                Cart::add($sepetUrun->urun->id, $sepetUrun->urun->urun_adi, $sepetUrun->adet,
                    $sepetUrun->fiyati, 0, ['slug' => $sepetUrun->urun->slug]);
            }


            // AKTİFLEŞTİR
            $kullanici = Auth::user();

            if ($kullanici->aktif_mi == 0) {

                request()->session()->regenerate();
                return redirect()->intended('/')
                    ->with('message', 'Lütfen Size Gönderilen E-postada ki Linke Tıklayarak Hesabınızı Aktifleştirin !!')
                    ->with('message_tur', 'danger');

            } else {
                request()->session()->regenerate();
                return redirect()->intended('/');

            }


        } else {
            $errors = ['email' => 'hatalı giriş'];
            return back()->withErrors($errors);
        }


    }


    public function kaydol_form()
    {

        return view('kullanici.kaydol');
    }


    public function kaydol(Request $request)
    {

        $validate = $request->validate([
            'adsoyad' => 'required|min:5|max:60',
            'email' => 'required|email|unique:kullanici',
            'sifre' => 'required|confirmed|min:5|max:15'
        ]);


        $kullanici = Kullanici::create([

            'adsoyad' => $request->adsoyad,
            'email' => $request->email,
            'sifre' => bcrypt($request->sifre),
            'aktivasyon_anahtari' => Str::random('60'),
            'aktif_mi' => 0

        ]);

        $kullanici->detay()->save(new KullaniciDetay());

        Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));

        Auth::login($kullanici);


        return redirect()->route('anasayfa');

    }


    public function aktiflestir($anahtar)
    {
        $kullanici = Kullanici::where('aktivasyon_anahtari', $anahtar)->first();
        if (!is_null($kullanici)) {
            $kullanici->aktivasyon_anahtari = null;
            $kullanici->aktif_mi = 1;
            $kullanici->save();

            return redirect()->route('anasayfa')
                ->with('mesaj_tur', 'danger')
                ->with('mesaj', 'Kullanici Kaydı Aktifleştirildi');
        } else {

            return redirect()->route('anasayfa')
                ->with('mesaj_tur', 'warning')
                ->with('mesaj', 'Kullanici Kaydı Aktifleştirilemedi');
        }


    }


    public function oturumukapat(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('anasayfa');
    }


}
