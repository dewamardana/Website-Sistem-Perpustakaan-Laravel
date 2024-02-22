@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data User</h1>
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
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NISN</th>
              <th scope="col">Nama</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $u)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $u->nisn }}</td>
              <td>{{ $u->nama }}</td>
              <td>
                <a href="/dashboard/user/{{$u->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/user/{{$u->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/user/{{ $u->id }}" method="post" class="d-inline">
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