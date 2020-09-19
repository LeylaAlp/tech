<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    @include('layouts.partials.head')
    @yield('head')

</head>

<body>


<div class="super_container">

    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')
    @yield('footer')


</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/app.js"></script>






{{--@if(session()->has('mesaj'))--}}
    {{--<script>--}}
        {{--alertify.success('{{ session('mesaj') }}');--}}
    {{--</script>--}}
{{--@endif--}}


</body>

</html>
