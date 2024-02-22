
<link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
@extends('layout.template')

@section('content')

    
<section class="products" id="products">

    <h1 class="heading"> Detail <span>Buku</span> </h1>

    <div class="product">
            
            <div class="box">
              @if($book->image)
                <img src="{{ asset('storage/' . $book->image) }}">
              @else
                <img src="/image/none.png" alt="">
              @endif
                
                <h1>{{ $book->judul }}</h1>
                <h2>{!! $book->deskripsi  !!}</h2>
                <h3 class="mt-4">Kategori : {{ $book->kategori->nama_kategori }}</h3>
                <h3 class="mt-3">Penulis  : {{ $book->penulis}}</h3>
                <h3 class="mt-3">Penerbit : {{ $book->penerbit->nama }}</h3>
                <form action="/cartdetail" method="post">
                @csrf
                <input type="hidden" name="buku_id" value={{$book->id}}>
                  <button class="btn" type="submit">
                      <i class="fas fa-shopping-cart"></i>
                  </button>
                </form>
                <a href="/" class="btn">kembali</a>
            </div>

    </div>


</section>
@endsection