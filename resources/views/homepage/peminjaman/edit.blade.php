@extends('layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="data">
    <div class="col">
      <div class="card mb-3">
        <div class="card-header">
          <h3 class="card-title">Item</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Kode Buku
                  </th>
                  <th>
                    Judul
                  </th>
                  <th>
                    Kategori
                  </th>
                  <th>
                    Penulis
                  </th>
                  <th>
                    Penerbit
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder->cart->detail as $detail)
                <tr>
                  <td>
                  <h5>{{ $loop->iteration }}</h5>
                  </td>
                  <td>
                  <h5>{{ $detail->buku->kode_buku }}</h5>
                  </td>
                  <td>
                  <h5>{{ $detail->buku->judul }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ $detail->buku->kategori->nama_kategori }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ $detail->buku->penulis }}</h5>
                  </td>
                  <td class="text-right">
                  <h5>{{ $detail->buku->penerbit->nama }}</h5>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
          <a href="/pinjam" class="tombol btn-danger col-2 m-auto mb-3">Tutup</a>
      </div>
    </div>
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
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
          <div class="table-responsive">
            <table class="table">
              <form action="{{ route('pinjam.update', $itemorder->id) }}" method='post'>
              @csrf
              {{ method_field('patch') }}
              

              <tbody>
                <tr>
                  <td>
                    <h4>Status Pengambilan</h4>
                  </td>
                  <td>
                    <select name="status_peminjaman" id="status_peminjaman" class="form-control">
                      <option value="sudah" {{ $itemorder->cart->status_peminjaman == 'sudah' ? 'selected':'' }}>Sudah Diambil</option>
                      <option value="belum" {{ $itemorder->cart->status_peminjaman == 'belum' ? 'selected':'' }}>Belum Diambil</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Tanggal Kembali</h4>
                  </td>
                  <td>
                  <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ $itemorder->cart->tanggal_kembali }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pengembalian</h4>
                  </td>
                  <td>
                    <select name="status_pengembalian" id="status_pengembalian" class="form-control">
                      <option value="sudah" {{ $itemorder->cart->status_pengembalian == 'sudah' ? 'selected':'' }}>Sudah Dikembalikan</option>
                      <option value="belum" {{ $itemorder->cart->status_pengembalian == 'belum' ? 'selected':'' }}>Belum dikembalikan</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Dikembalikan Pada</h4>
                  </td>
                  <td>
                    <input type="date" name="dikembalikan_pada" id="dikembalikan_pada" class="form-control" value="{{ $itemorder->cart->dikembalikan_pada }}">
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Denda</h4>
                  </td>
                  <td>
                    <input type="text" name="denda" id="denda" onclick="ganti()" class="form-control" value="{{ $itemorder->cart->denda }}">
                  </td>
                </tr>
                <tr>
                  <td>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </td>
                </tr>
              </tbody>
              </form>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script>
  var date1 = document.getElementById('tanggal_kembali').value;
  var date2 = document.getElementById('dikembalikan_pada').value;

  i = date2 - date1;
    i.addEventListener('change', function ganti() {
    if(i < 0){
        document.getElementById("denda").value = 0;
    }else{
      document.getElementById("denda").value = i * 1000;
    }
  });
</script>
@endsection