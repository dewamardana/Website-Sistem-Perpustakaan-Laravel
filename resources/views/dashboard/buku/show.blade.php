@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->nama }}</h1>
      </div>
<div class="d-flex justify-content-center">
<div class="card" style="width: 30rem;">

  @if($buku->image)
    <img src="{{ asset('storage/' . $buku->image) }}" class="card-img-top" width="500" height="500">
  @else
  <img src="/image/none.png" class="card-img-top" alt="...">
  @endif
  
  <div class="card-body">
    <h5 class="card-title">{{ $buku->judul}}</h5>
    <p class="card-text">{!! $buku->deskripsi !!}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Kategori : {{ $buku->kategori->nama_kategori }}</li>
    <li class="list-group-item">Penulis  : {{ $buku->penulis }}</li>
    <li class="list-group-item">Penerbit : {{ $buku->penerbit->nama }}</li>
  </ul>
  <div class="card-body">
    <a href="/dashboard/buku" class="card-link btn btn-success"><span data-feather="arrow-left"></span>Kembali</a>
    <a href="/dashboard/buku/{{$buku->slug}}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/buku/{{ $buku->slug }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger"  onclick="return confirm('Apakah Yakin ingin Menghapus Data?')">
        <span data-feather="x-circle"></span>Hapus</button>
    </form>
  </div>
</div>
</div>
@endsection