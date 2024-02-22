
@extends('layout.template')

@section('content')


<section> 
<div class="container">
  <div class="login-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('berhasil'))
              <div class="alert alert-succes alert-dismissible fade show" role="alert">
                {{ session('berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if(session()->has('gagal'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('gagal') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="card">
                <div class="card-header m-auto "><h3>Login Form</h3></div>

                <div class="card-body">
                    <form method="post" action="/login">
                        @csrf
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" name="nisn" id="nisn" 
                            class="form-control fs-3 @error('nisn') is-invalid @enderror" autofocus  required value="{{ old('nisn') }}"> 
                            @error('nisn')
                              <div class="invalid-feedback">\
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control fs-3" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn mb-4">Login</button>
                            <p>Belum Punya Akun? <a href="/register" class="text-decoration-none">Daftar</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  