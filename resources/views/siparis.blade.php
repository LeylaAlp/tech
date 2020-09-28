@extends('layouts.master')
@section('title','Sipariş Detayı')


@section('head')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    {{--<link rel="stylesheet" href="/css/app.css" type="text/css">--}}

@endsection


@section('content')

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Ürün</th>
                                <th>Tutar</th>
                                <th>Adet</th>
                                <th>Ara Toplam</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                                <tr>
                                    <td class="cart__product__item">
                                        <a href="{{ route('urun',$sepet_urun->urun->slug) }}"><img src="/images/cp-1.jpg" alt=""></a>
                                        <div class="cart__product__item__title">
                                            <h6><a href="{{ route('urun',$sepet_urun->urun->slug) }}">
                                                    {{ $sepet_urun->urun->urun_adi }}</a></h6>
                                            <div class="rating">

                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ $sepet_urun->fiyati }} ₺</td>
                                    <td class="cart__price">
                                        <div>
                                            <span> &nbsp; &nbsp; {{ $sepet_urun->adet }} adet</span>
                                        </div>
                                    </td>
                                    <td class="cart__total">{{ $sepet_urun->fiyati * $sepet_urun->adet }} ₺</td>
                                    <td>{{ $sepet_urun->durum }}</td>

                                </tr>

                            @endforeach
                            <tr>
                                <th colspan="3" class="text-right">Toplam Tutar</th>
                                <td colspan="1">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $siparis->siparis_tutari }} ₺</td>
                            </tr>

                            <tr>
                                <th colspan="3" class="text-right">Toplam Tutar (KDV'li)</th>
                                <td colspan="1"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $siparis->siparis_tutari * ((100+config('cart.tax'))/100) }} ₺</td>
                            </tr>

                            <tr>
                                <th colspan="3" class="text-right">Durum </th>
                                <td colspan="1">&nbsp;&nbsp;&nbsp; {{ $siparis->durum }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shop Cart Section End -->



@endsection






@section('footer')

    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.nicescroll.min.js"></script>
    <script src="/js/main.js"></script>

@endsection
