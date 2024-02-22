@extends('dashboard.layout.main')

@section('container')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Buku</h1>
      </div>

      <div class="col-lg-8">
        <form method="post" action="/dashboard/buku" class="mb-5" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" 
                  id="kode_buku" name="kode_buku" required value="{{old('kode_buku')}}">
              @error('kode_buku')
                <div class="invalid-feedback">
                  <h5>{{ $message }}</h5>
                </div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                    id="judul" name="judul" required value="{{old('judul')}}">
            @error('judul')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                    id="slug" name="slug" required value="{{old('slug')}}">
            @error('slug')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="image" class="form-label ">Foto Buku</label>
            <img src="" alt="" id="imgPreview" class="img-preview img-fluid mb-3 col-sm-5">
              <input class="form-control @error('image') is-invalid @enderror" 
                  type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
              <div class="invalid-feedback">
                <h5>{{ $message }}</h5>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Buku</label>
            @error('deskripsi')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{old('deskripsi')}}">
            <trix-editor input="deskripsi"></trix-editor>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori_id">
              @foreach($kategori as $k)
                @if(old('kategori_id') == $k->id)
                <option value="{{ $k->id}}" selected> {{$k->nama_kategori}}</option>
                @else
                <option value="{{ $k->id}}"> {{$k->nama_kategori}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" 
                    id="penulis" name="penulis" required value="{{old('penulis')}}">
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <select class="form-select" name="penerbit_id">
              @foreach($penerbit as $p)
                @if(old('penerbit_id') == $p->id)
                <option value="{{ $p->id}}" selected> {{$p->nama}}</option>
                @else
                <option value="{{ $p->id}}"> {{$p->nama}}</option>
                @endif
              @endforeach
            </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>


      <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
          fetch('/dashboard/buku/checkSlug?judul=' + judul.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
          e.preventDefault();
        })

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