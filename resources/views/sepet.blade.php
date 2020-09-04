@extends('layouts.master')
@section('title','Sepet')

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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cart__product__item">
                                    <img src="/images/cp-1.jpg" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>Chain bucket bag</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 150.0</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="cart__total">$ 300.0</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            <tr>
                                <td class="cart__product__item">
                                    <img src="/images/cp-2.jpg" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>Zip-pockets pebbled tote briefcase</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 170.0</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="cart__total">$ 170.0</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            <tr>
                                <td class="cart__product__item">
                                    <img src="/images/cp-3.jpg" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>Black jean</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 85.0</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="cart__total">$ 170.0</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            <tr>
                                <td class="cart__product__item">
                                    <img src="/images/cp-4.jpg" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>Cotton Shirt</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 55.0</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="cart__total">$ 110.0</td>
                                <td class="cart__close"><span class="icon_close"></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 750.0</span></li>
                            <li>Total <span>$ 750.0</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
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
