@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Penerbit</h1>
      </div>

      <div class="col-lg-8">
        <form method="post" action="/dashboard/penerbit" class="mb-5" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="kode_penerbit" class="form-label">Kode Penerbit</label>
            <input type="text" class="form-control @error('kode_penerbit') is-invalid @enderror" 
                  id="kode_penerbit" name="kode_penerbit" required value="{{old('kode_penerbit')}}">
              @error('kode_penerbit')
                <div class="invalid-feedback">
                  <h5>{{ $message }}</h5>
                </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                    id="nama" name="nama" required value="{{old('nama')}}">
            @error('nama')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                    id="alamat" name="alamat" required value="{{old('alamat')}}">
            @error('alamat')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="telpon" class="form-label">Telpon</label>
            <input type="text" class="form-control @error('telpon') is-invalid @enderror" 
                    id="telpon" name="telpon" required value="{{old('telpon')}}">
            @error('telpon')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label ">Foto Penerbit</label>
            <img src="" alt="" id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5">
              <input class="form-control @error('image') is-invalid @enderror" 
                  type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>

      <script>
        function previewImage() {
          const image = document.querySelector('#image');
          const imgP = document.querySelector('#imgPreview');

          imgP.style.display = 'block';
          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function (oFREvent) {
            imgP.src = oFREvent.target.result;
          }
        }
      </script>
@endsection