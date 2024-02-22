@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail User</h1>
      </div>
<div class="d-flex justify-content-center">
<div class="card" style="width: 30rem;">
  <img src="/image/product-1.png" class="card-img-top " alt="...">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">NISN : {{ $user->nisn}}</li>
    <li class="list-group-item">Nama : {{ $user->nama}}</li>
    <li class="list-group-item">Email : {{ $user->email}}</li>
    <li class="list-group-item">Telpon : {{ $user->telpon}}</li>
    <li class="list-group-item">Bergabung Pada : {{ $user->created_at}}</li>
  </ul>
  <div class="card-body">
    <a href="/dashboard/user" class="card-link btn btn-success"><span data-feather="arrow-left"></span>Kembali</a>
    <a href="/dashboard/user/{{$user->id}}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
      @method('delete')
      @csrf
      <button class="btn btn-danger"  onclick="return confirm('Apakah Yakin ingin Menghapus Data?')">
        <span data-feather="x-circle"></span>Hapus</button>
    </form>
  </div>
</div>
</div>
@endsection