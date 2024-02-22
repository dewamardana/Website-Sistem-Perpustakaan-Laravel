@extends('layout.template')

@section('content')
<div class="container">
  <div class="data">
  <div class="row">
    <div class="col col-md-8">
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
      @endforeach
      @endif
      @if ($message = Session::get('error'))
          <div class="alert alert-warning">
              <p>{{ $message }}</p>
          </div>
      @endif
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h3>Keranjang Belanja</h3>
        </div>
        <div class="card-body">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($itemcart->detail as $detail)
              <tr>
                <td>
                {{ $loop->iteration }}
                </td>
                <td>
                {{ $detail->buku->judul }}
                </td>
                <td>
                {{ $detail->buku->kategori->nama_kategori }}
                </td>
                <td>
                {{ $detail->buku->penulis }}
                </td>
                <td>
                {{ $detail->buku->penerbit->nama }}
                </td>
                <td>
                  <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="tombol btn-danger" 
                  onclick="return confirm('Apakah Yakin ingin Menghapus Data?')">
                    Hapus
                  </button>                    
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col col-md-4">
      <div class="card">
        <div class="card-header">
          <h3>Aksi</h3>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
              <form action="/pinjam" method="post">
                @csrf()
                <button type="submit" class="tombol btn-success">Pinjam Buku</button>
              </form>
            </div>
            <div class="col">
              <form action="/kosongkan/{{$itemcart->id}}" method="post">
                @method('patch')
                @csrf()
                <button type="submit" class="tombol btn-danger">Kosongkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection