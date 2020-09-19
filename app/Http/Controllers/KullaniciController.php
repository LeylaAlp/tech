<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use Illuminate\Http\Request;
use App\Models\Kullanici;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class KullaniciController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest')->except('oturumukapat','aktiflestir');
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

            $kullanici = Auth::user();
            $user = $kullanici->aktif_mi == 0;

            if ($user) {

                $request->session()->regenerate();
                return redirect()->intended('/')
                    ->with('message', 'Lütfen Size Gönderilen E-mailden aktivasyon işlemini gerçekleştiriniz')
                    ->with('message_tur', 'warning');
            } else {

                $request->session()->regenerate();
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
