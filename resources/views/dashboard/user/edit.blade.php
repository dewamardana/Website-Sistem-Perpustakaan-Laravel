@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data User</h1>
      </div>

      <div class="col-lg-8">
        <form method="post" action="/dashboard/user/{{ $u->id}}" class="mb-5">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control @error('nisn') is-invalid @enderror" 
                    id="nisn" name="nisn" required value="{{old('nisn', $u->nisn )}}">
            @error('nisn')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                    id="nama" name="nama" required value="{{old('nama', $u->nama )}}">
            @error('nama')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" 
                    id="email" name="email" required value="{{old('email', $u->email )}}">
            @error('email')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="telpon" class="form-label">Telepon</label>
            <input type="text" class="form-control @error('telpon') is-invalid @enderror" 
                    id="telpon" name="telpon" required value="{{old('telpon', $u->telpon )}}">
            @error('telpon')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
@endsection