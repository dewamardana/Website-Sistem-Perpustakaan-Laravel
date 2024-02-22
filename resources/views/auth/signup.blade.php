<link rel="stylesheet" href="{{ asset('css/styleinfo.css') }}">
@extends('layout.template')

@section('content')

<section>
<div class="container">
  <div class="login-form">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header m-auto "><h3>Register Form</h3></div>

                <div class="card-body">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label> 
                                    <input type="text" name="nama" id="nama" 
                                        class="form-control fs-3 @error('nama') is-invalid @enderror" required
                                        value="{{old('nama')}}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                      <h5>{{ $message }}</h5>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" name="nisn" id="nisn" 
                                    class="form-control fs-3 @error('nisn') is-invalid @enderror" required
                                    value="{{old('nisn')}}">
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                      <h5>{{ $message }}</h5>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" 
                                    class="form-control fs-3 @error('email') is-invalid @enderror" required
                                    value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                      <h5>{{ $message }}</h5>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telpon">No tlp</label>
                                    <input type="text" name="telpon" id="telpon" 
                                    class="form-control fs-3 @error('telpon') is-invalid @enderror" required
                                    value="{{old('telpon')}}">
                                    @error('telpon')
                                    <div class="invalid-feedback">
                                      <h5>{{ $message }}</h5>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" 
                                    class="form-control fs-3 @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                      <h5>{{ $message }}</h5>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn mb-4">Register</button>
                                    <p>Sudah punya akun? Login <a href="/login" class="text-decoration-none">disini</a></p>
                                </div>
                            </div>
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
  