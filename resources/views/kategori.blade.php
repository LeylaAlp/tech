@extends('layouts.master')
@section('title', $kategoriler->kategori_adi )
@section('head')
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    @endsection



@section('content')

    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{{ route('anasayfa') }}">Anasayfa</a></li>
                        <li class="active"><a href="{{ route('kategori',$kategoriler->slug) }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $kategoriler->kategori_adi }}</a></li>
                    </ul>
                </div>

                <!-- Sidebar -->

                <div class="sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>{{ $kategoriler->kategori_adi }}</h5>
                        </div>
                        <ul class="sidebar_categories">
                            @foreach($alt_kategoriler as $alt_kategori)
                            <li><a href="{{ route('kategori',$alt_kategori->slug) }}">{{ $alt_kategori->kategori_adi }}</a></li>
                           @endforeach
                        </ul>
                    </div>




                </div>

                <!-- Main Content -->

                <div class="main_content">

                    <!-- Products -->

                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>6</span></li>
                                                <li class="num_sorting_btn"><span>12</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                    </div>

                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">

                                    <!-- Product 1 -->

                                    <div class="product-item men">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_1.png" alt="">
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                                <div class="product_price">$520.00<span>$590.00</span></div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 2 -->

                                    <div class="product-item women">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_2.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                                <div class="product_price">$610.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 3 -->

                                    <div class="product-item women">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_3.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                                <div class="product_price">$120.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 4 -->

                                    <div class="product-item accessories">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_4.png" alt="">
                                            </div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                                <div class="product_price">$410.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 5 -->

                                    <div class="product-item women men">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_5.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                                <div class="product_price">$180.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 6 -->

                                    <div class="product-item accessories">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_6.png" alt="">
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                                <div class="product_price">$520.00<span>$590.00</span></div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 7 -->

                                    <div class="product-item women">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_7.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
                                                <div class="product_price">$610.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 8 -->

                                    <div class="product-item accessories">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_8.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
                                                <div class="product_price">$120.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 9 -->

                                    <div class="product-item men">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_9.png" alt="">
                                            </div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
                                                <div class="product_price">$410.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 10 -->

                                    <div class="product-item men">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_10.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                                <div class="product_price">$180.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>

                                    <!-- Product 11 -->

                                    <div class="product-item women men">
                                        <div class="product product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_5.png" alt="">
                                            </div>
                                            <div class="favorite"></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
                                                <div class="product_price">$180.00</div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>/

                                    <!-- Product 12 -->

                                    <div class="product-item accessories">
                                        <div class="product discount product_filter">
                                            <div class="product_image">
                                                <img src="/images/product_6.png" alt="">
                                            </div>
                                            <div class="favorite favorite_left"></div>
                                            <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
                                            <div class="product_info">
                                                <h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
                                                <div class="product_price">$520.00<span>$590.00</span></div>
                                            </div>
                                        </div>
                                        <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                    </div>
                                </div>

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                    <ul class="product_sorting">
                                        <li>
                                            <span>Show:</span>
                                            <span class="num_sorting_text">04</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>01</span></li>
                                                <li class="num_sorting_btn"><span>02</span></li>
                                                <li class="num_sorting_btn"><span>03</span></li>
                                                <li class="num_sorting_btn"><span>04</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span class="showing_results">Showing 1–3 of 12 results</span>
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                    </div>

                                </div>

                            </div>
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
    <script src="/js/categories_custom.js"></script>    @endsection
