<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}
