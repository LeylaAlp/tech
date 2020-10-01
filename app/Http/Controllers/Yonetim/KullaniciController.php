<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kullanici;
use App\Models\KullaniciDetay;

class KullaniciController extends Controller
{
    public function oturumac(Request $request)
    {

        if ($request->isMethod('POST')) {

            $validation = $request->validate([
                'email' => 'required|email',
                'sifre' => 'required'

            ]);

            $credentials = [
                'email' => $request->email,
                'password' => $request->sifre,
                'yonetici_mi' => 1
            ];

            if (Auth::guard('yonetim')->attempt($credentials, $request->has('beni_hatirla'))) {
                return redirect()->route('yonetim.anasayfa');
            } else {
                return back()->withInput()->withErrors(['email' => 'Giriş Hatalı !']);
            }


        }


        return view('yonetim.oturumac');
    }


    public function oturumukapat(Request $request)
    {
        Auth::guard('yonetim')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('oturumac');
    }


    public function index(Request $request)
    {

        if ($request->filled('aranan')) {
            $request->flash();
            $aranan = $request->aranan;
            $list = Kullanici::where('adsoyad', 'like', "%$aranan%")
                ->orWhere('email', 'like', "%$aranan%")
                ->orderByDesc('olusturulma_tarihi')
                ->paginate(8)
                ->appends('aranan', $aranan);
        } else {
            $list = Kullanici::orderByDesc('olusturulma_tarihi')->paginate(8);

        }

        return view('yonetim.kullanici.index', compact('list'));

    }


    public function form($id = 0)
    {
        $entry = new Kullanici;
        if ($id > 0) {
            $entry = Kullanici::find($id);
        }

        return view('yonetim.kullanici.form', compact('entry'));
    }


    public function kaydet(Request $request, $id = 0)
    {
        $validation = $request->validate([
            'adsoyad' => 'required',
            'email' => 'required|email'
        ]);

        $data = $request->only('email', 'adsoyad');
        if ($request->filled('sifre')) {
            $data['sifre'] = bcrypt($request->sifre);
        }

        $data['aktif_mi'] = $request->has('aktif_mi') && $request->aktif_mi == 1 ? 1 : 0;
        $data['yonetici_mi'] = $request->has('yonetici_mi') && $request->yonetici_mi == 1 ? 1 : 0;


        if ($id > 0) {
            $entry = Kullanici::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Kullanici::create($data);
        }

        KullaniciDetay::updateOrCreate(
            ['kullanici_id' => $entry->id],
            [
                'adres' => $request->adres,
                'telefon' => $request->telefon,
                'ceptelefonu' => $request->ceptelefonu
            ]
        );


        return redirect()->route('yonetim.kullanici.duzenle', $entry->id)
            ->with('mesaj', ($id > 0 ? 'Güncelleme İşlemi Başarılı' : 'Kaydetme İşlemi Başarılı'))
            ->with('mesaj_tur', 'success');
    }


    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()->route('yonetim.kullanici');
    }


}
