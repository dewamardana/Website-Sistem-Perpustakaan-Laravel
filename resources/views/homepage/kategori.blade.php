
<link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
@extends('layout.index')

@section('main')
<section class="categories" id="categories">

    <h1 class="heading"> kategori <span>{{ $info }}</span> </h1>

    <div class="box-container">
      @foreach($kategori as $k)
        <div class="box">
            @if($k->image)
              <img src="{{ asset('storage/' . $k->image) }}">
            @else
                <img src="/image/none.png" class="card-img-top" alt="...">
            @endif
            <h3>{{$k->judul}}</h3>
            <h4>{{$k->penulis}}</h4>
            <h4>{{$k->penerbit->nama}}</h4>
            <form action="/cartdetail" method="post">
              @csrf
                <input type="hidden" name="buku_id" value={{$k->id}}>
                  <button class="btn" type="submit">
                      <i class="fas fa-shopping-cart"></i>
                  </button>
                </form>
                <a href="/" class="btn">kembali</a>
                <a href="/buku/{{ $k->slug }}" class="btn text-decoration-none">lihat</a>
        </div>
        @endforeach
        

    </div>

</section> 

@endsection