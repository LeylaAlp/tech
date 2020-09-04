<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    @include('layouts.partials.head')
    @yield('head')

</head>

<body>

<div class="super_container">

    <!-- Header -->

   @include('layouts.partials.navbar')

  @yield('content')

    @include('layouts.partials.footer')
    @yield('footer')


</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>
</body>

</html>
