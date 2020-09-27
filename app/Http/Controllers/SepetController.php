<?php

namespace App\Http\Controllers;

use App\Models\SepetUrun;
use Illuminate\Http\Request;
use App\Models\Urun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Sepet;

class SepetController extends Controller
{
    public function index()
    {
        return view('sepet');
    }

    public function ekle(Request $request)
    {
        $urun = Urun::find($request->id);
        $cartItem = Cart::add($urun->id, $urun->urun_adi, 1, $urun->fiyati, 0, ['slug' => $urun->slug]);

        if (Auth::check()) {
            $aktif_sepet_id = session('aktif_sepet_id');

            if (!isset($aktif_sepet_id)) {
                $aktif_sepet = Sepet::create([
                    'kullanici_id' => Auth::id()
                ]);
                $aktif_sepet_id = $aktif_sepet->id;
                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }


            SepetUrun::updateOrCreate(

                ['sepet_id' => $aktif_sepet_id, 'urun_id' => $urun->id],
                ['adet' => $cartItem->qty, 'fiyati' => $urun->fiyati, 'durum' => 'Beklemede']
            );


        }

        return redirect()->route('sepet')
            ->with('mes', 'Ürün Sepete Eklendi')
            ->with('mes_tur', 'success');

    }


    public function kaldir($rowid)
    {

        if (Auth::check()) {

            $aktif_sepet_id=session('aktif_sepet_id');
            $cartItem=Cart::get($rowid);
            SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)->delete();
        }

        Cart::remove($rowid);

        return redirect()->route('sepet')
            ->with('mes', 'Ürün Sepetten Kaldırıldı')
            ->with('mes_tur', 'warning');
    }


    public function bosalt()
    {

        if (Auth::check()) {

            $aktif_sepet_id=session('aktif_sepet_id');
            SepetUrun::where('sepet_id',$aktif_sepet_id)->delete();
        }


        Cart::destroy();

        return redirect()->route('sepet')
            ->with('mes', 'Sepet Başarıyla Boşaltıldı')
            ->with('mes_tur', 'warning');
    }


    public function guncelle($rowid, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'adet' => 'required|numeric|between:0,5'
        ]);

        if ($validator->fails()) {
            session()->flash('mes', 'Ürün Değeri en fazla 5 olmalıdır !');
            session()->flash('mes_tur', 'warning');

            return response()->json(['warning' => false]);
        }


        if(Auth::check()){

            $aktif_sepet_id=session('aktif_sepet_id');
            $cartItem=Cart::get($rowid);

            if($request->adet==0)
                SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)->delete();
                else
                SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)->update(
              ['adet' => $request->adet]
            );
        }




        Cart::update($rowid, request('adet'));

        session()->flash('mes', 'Ürün Adedi Guncellendi');
        session()->flash('mes_tur', 'success');

        return response()->json(['success' => true]);
    }


}


























