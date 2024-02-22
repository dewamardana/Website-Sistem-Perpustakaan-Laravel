@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang {{ auth()->user()->nama }}</h1>
      </div>

      @if(session()->has('berhasil'))
      <div class="alert alert-success col-lg-8" role="alert">
          {{ session('berhasil') }}
      </div>
      @endif

      @if(session()->has('error'))
      <div class="alert alert-danger col-lg-8" role="alert">
          {{ session('error') }}
      </div>
      @endif

      <div class="table-responsive col-lg-8">
        <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah kategori</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">kode kategori</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kategori as $k)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $k->kode_kategori }}</td>
              <td>{{ $k->nama_kategori }}</td>
              <td>
                <a href="/dashboard/kategori/{{$k->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/kategori/{{$k->slug}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/kategori/{{ $k->id }}" method="post" class="d-inline">
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