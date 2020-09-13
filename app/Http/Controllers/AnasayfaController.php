<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;

class AnasayfaController extends Controller
{
    public function index(Request $request)
    {
        $kategoriler = Kategori::whereRaw('ust_id is null')->take(3)->get();



        $urun_gunun_firsati = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
            ->where('urun_detay.goster_gunun_firsati', 1)
            ->orderBy('guncelleme_tarihi', 'desc')
            ->first();


        $urunler_slider = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
            ->where('urun_detay.goster_slider', 1)
            ->orderByDesc('guncelleme_tarihi')
            ->first();


        $urunler_cok_satan = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
            ->where('urun_detay.goster_cok_satan', 1)
            ->orderByDesc('guncelleme_tarihi')
            ->take(10)
            ->get();


        $urunler_one_cikan = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
            ->where('urun_detay.goster_one_cikan', 1)
            ->orderByDesc('guncelleme_tarihi')
            ->take(4)
            ->get();


        $urunler_indirimli = Urun::select('urun.*')
            ->join('urun_detay', 'urun_detay.urun_id', 'urun.id')
            ->where('urun_detay.goster_indirimli', 1)
            ->orderByDesc('guncelleme_tarihi')
            ->take(4)
            ->get();


        return view('anasayfa', compact('kategoriler', 'urun_gunun_firsati', 'urunler_slider', 'urunler_cok_satan',
            'urunler_one_cikan', 'urunler_indirimli'));

    }
}
