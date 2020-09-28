@extends('layouts.master')
@section('title','Siparişler')

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


    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">

                        @if(count($siparisler)==0)
                            <img src="/images/siparis.png">
                            @else
                        <table>
                            <thead>
                            <tr>
                                <th>Sipariş Kodu</th>
                                <th>Fiyat</th>
                                <th>Toplam Ürün</th>
                                <th>Durum</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($siparisler as $siparis)
                            <tr>
                                <td class="cart__product__item">
                                    <div class="cart__product__item__title">
                                        <h6> SP-000{{ $siparis->id }}</h6>
                                        <div class="rating">

                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">{{ $siparis->siparis_tutari * ((100+config('cart.tax'))/100) }} ₺</td>
                                <td class="cart__price">
                                    <div>
                                       <span>&nbsp; &nbsp;{{ $siparis->sepet->sepet_urun_adet() }} adet</span>
                                    </div>
                                </td>
                                <td class="cart__total">{{ $siparis->durum }}</td>
                                <td>
                                    <button class="btn btn-dark btn-md" type="submit"><a href="{{ route('siparis',$siparis->id) }}">
                                            Detay</a></button>
                                </td>
                            </tr>
@endforeach
                            </tbody>
                        </table>
                            @endif
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
