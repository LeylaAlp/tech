<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{ route('yonetim.anasayfa') }}">
                        <i class="fas fa-tachometer-alt"></i>Anasayfa</a>
                </li>
                <li>
                    <a href="{{ route('yonetim.kullanici') }}">
                        <i class="fas fa-users"></i>Kullanıcılar</a>
                </li>
                <li>
                    <a href="{{ route('yonetim.kategori') }}">
                        <i class="fas fa-table"></i>Kategoriler</a>
                </li>
                <li>
                    <a href="{{ route('yonetim.urun') }}">
                        <i class="fa fa-square"></i>Ürünler</a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                </li>


            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
