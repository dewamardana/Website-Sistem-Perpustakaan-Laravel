
<link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
@extends('layout.index')

@section('main')
<section class="categories" id="categories">

    <h1 class="heading"> Penerbit <span>{{ $info }}</span> </h1>

    <div class="box-container">
      @foreach($penerbit as $p)
        <div class="box">
            @if($p->image)
              <img src="{{ asset('storage/' . $p->image) }}" class="card-img-top" >
            @else
                <img src="/image/none.png" class="card-img-top" alt="...">
            @endif
            <h3>{{$p->judul}}</h3>
            <h4>{{$p->penulis}}</h4>
            <h5>{{$p->kategori->nama_kategori}}</h5>
            <form action="/cartdetail" method="post">
              @csrf
                <input type="hidden" name="buku_id" value={{$p->id}}>
                  <button class="btn" type="submit">
                      <i class="fas fa-shopping-cart"></i>
                  </button>
                </form>
                <a href="/" class="btn">kembali</a>
                <a href="/buku/{{ $p->slug }}" class="btn text-decoration-none">lihat</a>
        </div>
        @endforeach
        

    </div>

</section> -->

<!-- categories section ends

@endsection