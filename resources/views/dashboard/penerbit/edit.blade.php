@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Penerbit</h1>
      </div>

      <div class="col-lg-8">
        <form method="post" action="/dashboard/penerbit/{{ $p->id }}" class="mb-5" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Penerbit</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                    id="nama" name="nama" required value="{{old('nama', $p->nama )}}">
            @error('nama')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" 
                    id="alamat" name="alamat" required value="{{old('alamat', $p->alamat )}}">
            @error('alamat')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="telpon" class="form-label">Telpon</label>
            <input type="text" class="form-control @error('telpon') is-invalid @enderror" 
                    id="telpon" name="telpon" required value="{{old('telpon', $p->telpon )}}">
            @error('telpon')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label ">Foto Kategori</label>
            @if($p->image)
              <img src="{{ asset('storage/' . $p->image ) }}" alt="" id="imgPreview" 
                  class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
              <img src="" alt="" id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5">
            @endif
              <input class="form-control @error('image') is-invalid @enderror" 
                  type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
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