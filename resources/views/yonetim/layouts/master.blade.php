<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title','Yönetim Paneli')</title>

   @include('yonetim.layouts.partials.head')
    @yield('head')

</head>

<body class="animsition">
<div class="page-wrapper">

    @include('yonetim.layouts.partials.navbar')

    @include('yonetim.layouts.partials.sidebar')

   @yield('content')
</div>



<div class="col-md-12">
    <div class="copyright">
        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
    </div>
</div>

<!-- Jquery JS-->
<!-- Bootstrap JS-->
<script src="/yonetim/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="/yonetim/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="/yonetim/vendor/slick/slick.min.js">
</script>
<script src="/yonetim/vendor/wow/wow.min.js"></script>
<script src="/yonetim/vendor/animsition/animsition.min.js"></script>
<script src="/yonetim/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>

<script src="/yonetim/vendor/circle-progress/circle-progress.min.js"></script>
<script src="/yonetim/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/yonetim/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="/yonetim/vendor/select2/select2.min.js">
</script>

<script src="/yonetim/js/main.js"></script>

@yield('footer')


</body>

</html>
<!-- end document-->
