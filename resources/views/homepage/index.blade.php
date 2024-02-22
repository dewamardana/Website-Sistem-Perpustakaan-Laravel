@extends('layout.index')

@section('main')

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Perpustakaan <span>SMK Negeri 2 Tabanan</span></h3>
        <p>Kami Menyediakan berbagai jenis buku. Jadi silahkan datang pada hari keja untuk melakukan pengambilan buku.</p>
        <a href="#" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->

<!-- products section starts  -->

<section class="products" id="terbaru">

    <h1 class="heading"> Buku <span>Terbaru</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
            @foreach($terbaru as $t)
            <div class="swiper-slide box">
              @if($t->image)
                <img src="{{ asset('storage/' . $t->image) }}">
              @else
                <img src="/image/none.png" class="card-img-top" alt="...">
              @endif
                <h3>{{ $t->judul }}</h3>
                <h4>{{ $t->kategori->nama_kategori}} </h4>
                <a href="/penerbit/{{ $t->penerbit->kode_penerbit }}"><h5>{{$t->penerbit->nama}}</h5></a>  
                
                <form action="/cartdetail" method="post">
                      @csrf
                        <input type="hidden" name="buku_id" value={{$t->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="/buku/{{ $t->slug }}" class="btn text-decoration-none">lihat</a>
                </form>
            </div>
            @endforeach
        </div>

    </div>


</section>


<section class="products" id="terlaris">

    <h1 class="heading"> Buku <span>Terlaris</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
            @foreach($terlaris as $t)
            <div class="swiper-slide box">
              @if($t->image)
                <img src="{{ asset('storage/' . $t->image) }}">
              @else
                <img src="/image/none.png" class="card-img-top" alt="...">
              @endif
                <h3>{{ $t->judul }}</h3>
                <h4>{{ $t->kategori->nama_kategori}} </h4>
                <a href="/penerbit/{{ $t->penerbit->kode_penerbit }}"><h5>{{$t->penerbit->nama}}</h5></a>  
                
                <form action="/cartdetail" method="post">
                      @csrf
                        <input type="hidden" name="buku_id" value={{$t->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="/buku/{{ $t->slug }}" class="btn text-decoration-none">lihat</a>
                </form>
            </div>
            @endforeach
        </div>

    </div>


</section>

<section class="products" id="terbatas">

    <h1 class="heading"> Stok <span>Terbatas</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
            @foreach($terbatas as $t)
            <div class="swiper-slide box">
              @if($t->image)
                <img src="{{ asset('storage/' . $t->image) }}">
              @else
                <img src="/image/none.png" class="card-img-top" alt="...">
              @endif
                <h3>{{ $t->judul }}</h3>
                <h4>{{ $t->kategori->nama_kategori}} </h4>
                <a href="/penerbit/{{ $t->penerbit->kode_penerbit }}"><h5>{{$t->penerbit->nama}}</h5></a>  
                
                <form action="/cartdetail" method="post">
                      @csrf
                        <input type="hidden" name="buku_id" value={{$t->id}}>
                        <button class="btn" type="submit">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    <a href="/buku/{{ $t->slug }}" class="btn text-decoration-none">lihat</a>
                </form>
            </div>
            @endforeach
        </div>

    </div>


</section>
<!-- products section ends -->

<!-- categories section starts  -->


<section class="categories" id="kategori">

    <h1 class="heading"> product <span>categories</span> </h1>

    <div class="box-container">
      @foreach($kategori as $k)
        <div class="box">
          @if($k->image)
                <img src="{{ asset('storage/' . $k->image) }}">
              @else
                <img src="image/none.png" alt="">
              @endif
            
            <h3>{{$k->nama_kategori}}</h3>
            <p>{!! $k->deskripsi_kategori !!}</p>
            <a href="/kategori/{{$k->slug}}" class="btn">Lihat</a>
        </div>
        @endforeach
        

    </div>

</section>

<!-- categories section ends -->


<!-- Penerbit section starts  -->
<section class="categories" id="penerbit">

    <h1 class="heading"> Daftar<span>Penerbit</span> </h1>

    <div class="box-container">
      @foreach($penerbit as $p)
        <div class="box">
          @if($p->image)
                <img src="{{ asset('storage/' . $p->image) }}">
              @else
                <img src="image/none.png" alt="">
              @endif
            
            <h3>{{$p->nama}}</h3>
            <a href="/penerbit/{{$p->kode_penerbit}}" class="btn">Lihat</a>
        </div>
        @endforeach
        

    </div>

</section>

<!-- Penerbit section ends  -->

@endsection