@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->nama }}</h1>
      </div>

      @if(session()->has('berhasil'))
      <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
      </div>
      @endif

      <div class="table-responsive">
        <a href="/dashboard/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Judul</th>
              <th scope="col">Kategori</th>
              <th scope="col">Aksi</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($buku as $b)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $b->judul }}</td>
              <td>{{ $b->kategori->nama_kategori }}</td>
              <td>
                <a href="/dashboard/buku/{{$b->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/buku/{{$b->slug}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/buku/{{ $b->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0"  onclick="return confirm('Apakah Yakin ingin Menghapus Data?')">
                    <span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection