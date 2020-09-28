<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Siparis;

class OdemeController extends Controller
{

    public function index()
    {

        if(!Auth::check()){
            return redirect()->route('kullanici.oturumac')
                ->with('mesajj','Ödeme İşlemi İçin Giriş Yapmanız veya Kayıt Olmanız Gerekmektedir !')
                ->with('mesajj_tur','danger');
        }else if(count(Cart::content())==0){
            return redirect()->route('anasayfa')
                ->with('mesaj','Ödeme İşlemi İçin Sepetinizde Ürün Bulunmalıdır !')
                ->with('mesaj_tur','danger');
        }

        $kullanici_detay=Auth::user()->detay;


        return view('odeme',compact('kullanici_detay'));
    }


    public function odemeyap()
    {
       $siparis=request()->all();
       $siparis['sepet_id']=session('aktif_sepet_id');
       $siparis['banka'] ='Garanti';
       $siparis['taksit_sayisi']=1;
       $siparis['durum']="Siparişiniz Alındı";
       $siparis['siparis_tutari']=Cart::subtotal();


       Siparis::create($siparis);
       Cart::destroy();
       session()->forget('aktif_sepet_id');

       return redirect()->route('siparisler')
           ->with('me','Ödemeniz Başarılı Bir Şekilde Gerçekleştirildi')
           ->with('me_tur','success');

    }


}
