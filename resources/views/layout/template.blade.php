<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') }}">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
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
  @yield('content')
</div>


<!-- footer section starts  -->
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>