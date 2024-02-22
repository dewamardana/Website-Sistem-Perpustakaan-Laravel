@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Penerbit</h1>
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
        <a href="/dashboard/penerbit/create" class="btn btn-primary mb-3">Tambah Penerbit</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode Penerbit</th>
              <th scope="col">Nama Penerbit</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($penerbit as $p)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $p->kode_penerbit }}</td>
              <td>{{ $p->nama }}</td>
              <td>
                <a href="/dashboard/penerbit/{{$p->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/penerbit/{{$p->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/penerbit/{{ $p->id }}" method="post" class="d-inline">
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