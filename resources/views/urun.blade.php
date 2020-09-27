@extends('layouts.master')
@section('title',$urun->urun_adi)

@section('head')
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_responsive.css">



    @endsection


@section('content')

    <div class="container single_product_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('anasayfa') }}">Anasayfa</a></li>
                        @foreach($kategoriler as $kategori)
                        <li><a href="{{ route('kategori',$kategori->slug) }}"><i class="fa fa-angle-right" aria-hidden="true">
                                </i>{{ $kategori->kategori_adi }}</a></li>
                        @endforeach
                        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $urun->urun_adi }}</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">
                        <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                            <div class="single_product_thumbnails">
                                <!--   -->
                                <ul>
                                    <li><img src="/images/single_1_thumb.jpg" alt="" data-image="images/single_1.jpg"></li>
                                    <li class="active"><img src="/images/single_2_thumb.jpg" alt="" data-image="images/single_2.jpg"></li>
                                    <li><img src="/images/single_3_thumb.jpg" alt="" data-image="images/single_3.jpg"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">
                                <div class="single_product_image_background" style="background-image:url(/images/single_2.jpg)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">
                    <div class="product_details_title">
                        <h2>{{ $urun->urun_adi }}</h2>
                        <p>{{ $urun->aciklama }}</p>
                    </div>
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span>Ücretsiz Teslimat</span>
                    </div>
                   <br>
                    <br>
                    <div class="product_price">{{ $urun->fiyati }} ₺</div>

                    <br>
                    <br>
                    <br>
                    <br>

                    <form action="{{ route('sepet.ekle') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $urun->id }}">
                        <button type="submit" class="btn btn-danger btn-md btn-block">
                            Sepete Ekle</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <!-- Tabs -->

    <div class="tabs_section_container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabs_container">
                        <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                            <li class="tab active" data-active-tab="tab_1"><span>Reviews (2)</span></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">



                    <!-- Tab Reviews -->

                    <div id="tab_1" class="tab_container active">
                        <div class="row">

                            <!-- Kullanici Reviews -->

                            <div class="col-lg-6 reviews_col">
                                <div class="tab_title reviews_title">
                                    <h4>Reviews (2)</h4>
                                </div>

                                <!-- Kullanici Review -->

                                <div class="user_review_container d-flex flex-column flex-sm-row">
                                    <div class="user">
                                        <div class="user_pic"></div>
                                        <div class="user_rating">
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review_date">27 Aug 2016</div>
                                        <div class="user_name">Brandon William</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>

                                <!-- Kullanici Review -->

                                <div class="user_review_container d-flex flex-column flex-sm-row">
                                    <div class="user">
                                        <div class="user_pic"></div>
                                        <div class="user_rating">
                                            <ul class="star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="review_date">27 Aug 2016</div>
                                        <div class="user_name">Brandon William</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Add Review -->

                            <div class="col-lg-6 add_review_col">

                                <div class="add_review">
                                    <form id="review_form" action="post">
                                        <div>
                                            <h1>Add Review</h1>
                                            <input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
                                            <input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                                        </div>
                                        <div>
                                            <h1>Your Rating:</h1>
                                            <ul class="user_star_rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                            <textarea id="review_message" class="input_review" name="message"  placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
                                        </div>
                                        <div class="text-left text-sm-right">
                                            <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection


@section('footer')

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/styles/bootstrap4/popper.js"></script>
    <script src="/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="/plugins/easing/easing.js"></script>
    <script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="/js/single_custom.js"></script>

    @endsection
