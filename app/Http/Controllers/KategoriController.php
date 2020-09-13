<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request, $slug_kategoriadi)
    {
        $kategoriler = Kategori::where('slug', $slug_kategoriadi)->firstOrFail();
        $alt_kategoriler = Kategori::where('ust_id', $kategoriler->id)->get();


            $urunler = $kategoriler->urunler()->paginate(2);


        return view('kategori', compact('kategoriler', 'alt_kategoriler', 'urunler'));
    }
}
