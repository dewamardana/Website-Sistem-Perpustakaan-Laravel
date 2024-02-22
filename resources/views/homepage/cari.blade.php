
<link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
@extends('layout.index')

@section('main')
<section class="categories" id="categories">

    <h1 class="heading"> <span> Hasil Pencarian</span> </h1>

    <div class="box-container">
      @foreach($hasil as $h)
        <div class="box">
          @if($h->image)
                <img src="{{ asset('storage/' . $h->image) }}">
              @else
                <img src="/image/none.png" alt="">
              @endif
            <h3>{{$h->judul}}</h3>
            <h4>{{$h->penulis}}</h4>
            <h4>{{$h->penerbit->nama}}</h4>
            <form action="/cartdetail" method="post">
              @csrf
                <input type="hidden" name="buku_id" value={{$h->id}}>
                  <button class="btn" type="submit">
                      <i class="fas fa-shopping-cart"></i>
                  </button>
                </form>
                <a href="/" class="btn">kembali</a>
                <a href="/buku/{{ $h->slug }}" class="btn text-decoration-none">lihat</a>
        </div>
        @endforeach
        

    </div>

</section> -->

@endsection