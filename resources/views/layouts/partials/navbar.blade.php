

<header class="header trans_300">

    @if(session()->has('me'))
        <div class="alert alert-{{ session('me_tur') }} alert-dismissible fade show save" role="alert">
            <strong>

                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                {{ session('me') }}</strong>

        </div>
    @endif


    @if(session()->has('mesajj'))
        <div class="alert alert-{{ session('mesajj_tur') }} alert-dismissible fade show save" role="alert">
            <strong>

                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                {{ session('mesajj') }}</strong>

        </div>
    @endif


@if(session()->has('mesaj'))
        <div class="alert alert-{{ session('mesaj_tur') }} alert-dismissible fade show save" role="alert">
            <strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                {{ session('mesaj') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif


        @if(session()->has('message'))
            <div class="alert alert-{{ session('message_tur') }} alert-dismissible fade show" role="alert">
                <strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                    {{ session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif


    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">100 TL ve üzeri alışverişlerinizde kargo ücretsiz !</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- Currency / Language / My Account -->


                            {{--<li class="language">--}}
                                {{--<a href="#">--}}
                                    {{--English--}}
                                    {{--<i class="fa fa-angle-down"></i>--}}
                                {{--</a>--}}
                                {{--<ul class="language_selection">--}}
                                    {{--<li><a href="#">French</a></li>--}}
                                    {{--<li><a href="#">Italian</a></li>--}}
                                    {{--<li><a href="#">German</a></li>--}}
                                    {{--<li><a href="#">Spanish</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li class="account">

                                @guest
                                    <a href="#">
                                        &nbsp; &nbsp;  Hesap &nbsp; &nbsp;
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                <ul class="account_selection">
                                    <li><a href="{{ route('kullanici.oturumac') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Giriş Yap</a></li>
                                    <li><a href="{{ route('kullanici.kaydol') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Kayıt Ol</a></li>
                                </ul>
                                @endguest

                                @auth
                                        <a href="#">
                                           Hesabım
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                <ul class="account_selection">

                                    <li><a href="{{ route('siparisler') }}">Siparislerim</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').
submit()">Çıkış</a>
                                        <form id="logout-form" action="{{ route('kullanici.oturumukapat') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </li>

                                </ul>
                                @endauth

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{ route('anasayfa') }}">colo<span>shop</span></a>
                    </div>
                    &nbsp; &nbsp;&nbsp;
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="#">home</a></li>
                            <li><a href="#">shop</a></li>
                            <li><a href="#">promotion</a></li>
                            <li><a href="#">pages</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                        <ul class="navbar_user">
                            <li>
                                <div class="s128">
                                    <form method="POST" action="{{ route('urun_ara') }}">
                                        @csrf
                                        <div class="inner-form">
                                            <div class="row">
                                                <div class="input-field first" id="first">
                                                    <input  name="aranan" class="input" id="inputFocus" type="text" placeholder="Keyword"
                                                    value="{{ old('aranan') }}"/>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </li>
                            <li class="checkout">
                                <a href="{{ route('sepet') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">{{ Cart::count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>




<script>
    var btnDelete = document.getElementById('clear');
    var inputFocus = document.getElementById('inputFocus');
    //- btnDelete.on('click', function(e) {
    //-   e.preventDefault();
    //-   inputFocus.classList.add('isFocus')
    //- })
    //- inputFocus.addEventListener('click', function() {
    //-   this.classList.add('isFocus')
    //- })
    btnDelete.addEventListener('click', function(e)
    {
        e.preventDefault();
        inputFocus.value = ''
    })
    document.addEventListener('click', function(e)
    {
        if (document.getElementById('first').contains(e.target))
        {
            inputFocus.classList.add('isFocus')
        }
        else
        {
            // Clicked outside the box
            inputFocus.classList.remove('isFocus')
        }
    });

</script>
