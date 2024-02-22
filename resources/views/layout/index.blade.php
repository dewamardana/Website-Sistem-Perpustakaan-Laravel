<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css') }}"/>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"> <img src="/image/logo.png" alt="" width="50" height="50"> DUTA</a>

    <nav class="navbar">
        <a href="/">home</a>
        <a href="/#terbaru">Terbaru</a>
        <a href="/#terlaris">Terlaris</a>
        <a href="/#terbatas">Terbatas</a>
        <a href="/#kategori">Kategori</a>
        <a href="/#penerbit">Penerbit</a>
    </nav>

    @auth
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <a href="/cart"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
        <div class="fas fa-th-list" id="login-btn"></div>
    </div>

    <div class="menu">
      <p>Selamat Datang, {{ auth()->user()->nama }}</p>
      @can('admin')
      <p><a href="/dashboard" class="btn">Dashboard</a></p>
      @endcan
      <p><a href="/pinjam" class="btn"> Data Transaksi </a>
      </p>
        <form action="/logout" method="post">
          @csrf
              <button type="submit" class="btn">Logout</button>
        </form>
    </div>
    @else
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <a href="/cart"><div class="fas fa-shopping-cart" id="cart-btn"></div></a>
        <a href="/login"><div class="fas fa-user" id="login-btn"></div></a>
    </div>
    @endauth

    <form action="/cari" class="search-form">
        <input type="text" id="search-box" placeholder="search here..." name="cari">
        <label for="search-box" class="fas fa-search"></label>
    </form>


</header>

<!-- header section ends -->


<div class="main">
  @yield('main')
</div>


<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3><img src="/image/logo.png" alt="" width="50" height="50"> DUTA</h3>
            <p>Link Media Social SMK Negeri 2 Tabanan</p>
            <div class="share">
                <a href="https://www.facebook.com/DutaSMK" class="fab fa-facebook-f"></a>
                <a href="https://instagram.com/osisdutasmk?igshid=YmMyMTA2M2Y=" class="fab fa-instagram"></a>
                <a href="http://www.smkn2tabanan.sch.id/" class="fas fa-globe"></a>
                <a href="https://youtube.com/@SMKN2Tabanan" class="fab fa-youtube"></a>
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i>0361-8945356 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> smkn2tabanan@ymail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> 
Jalan Wisnu-Belayu, Marga, Tabanan - Bali (82181)</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="/" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="/#terbaru" class="links"> <i class="fas fa-arrow-right"></i> Terbaru </a>
            <a href="/#terlaris" class="links"> <i class="fas fa-arrow-right"></i> Terlaris </a>
            <a href="/#terbatas" class="links"> <i class="fas fa-arrow-right"></i> Terbatas </a>
            <a href="/#kategori" class="links"> <i class="fas fa-arrow-right"></i> Kategori </a>
            <a href="/#penerbit" class="links"> <i class="fas fa-arrow-right"></i> Penerbit </a>
        </div>


    </div>

    <div class="credit"> <span> SMK Negeri 2 Tabanan </span> | 2023 </div>

</section>

<!-- footer section ends -->











<script src="{{ asset('https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js') }}"></script>

<!-- custom js file link  -->
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
<!-- loader part  -->
<!-- <div class="loader-container">
    <img src="images/loader.gif" alt="">
</div> -->




















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>