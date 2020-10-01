<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('aranan') || $request->filled('ust_id')) {
            $request->flash();
            $aranan = $request->aranan;
            $ust_id = $request->ust_id;
            $list = Kategori::where('kategori_adi', 'like', "%$aranan%")
            ->where('ust_id',$ust_id)
                ->paginate(2)
                ->appends(['aranan' => $aranan,'ust_id' => $ust_id]);
        } else {
            $request->flush();
            $list = Kategori::orderByDesc('id')->paginate(8);
        }


        $anakategoriler=Kategori::whereRaw('ust_id is null')->get();


        return view('yonetim.kategori.index', compact('list','anakategoriler'));
    }


    public function form($id = 0)
    {
        $entry = new Kategori;
        if ($id > 0) {
            $entry = Kategori::find($id);
        }

        $kategoriler = Kategori::all();

        return view('yonetim.kategori.form', compact('entry', 'kategoriler'));
    }


    public function kaydet(Request $request, $id = 0)
    {

        $data = $request->only('kategori_adi', 'slug', 'ust_id');
        if (!$request->filled('slug')) {
            $data['slug'] = Str::slug($request->kategori_adi);
            $request->merge(['slug' => $data['slug']]);
        }

        $validation = $request->validate([
            'kategori_adi' => 'required',
            'slug' => ($request->original_slug != $request->slug ? 'unique:kategori,slug' : '')
        ]);


        if ($id > 0) {
            $entry = Kategori::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Kategori::create($data);
        }


        return redirect()->route('yonetim.kategori.duzenle', $entry->id)
            ->with('mesaj', ($id > 0 ? 'Güncelleme İşlemi Başarılı' : 'Kaydetme İşlemi Başarılı'))
            ->with('mesaj_tur', 'success');
    }


    public function sil($id)
    {

        $kategoriler=Kategori::find($id);
        $kategoriler->urunler()->detach();
        $kategoriler->delete();



        Kategori::destroy($id);
        return redirect()->route('yonetim.kategori')
            ->with('mesaj','Silme İşlemi Başarılı')
            ->with('mesaj_tur','success');

    }


}
