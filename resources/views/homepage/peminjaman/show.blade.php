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
    <div class="col col-lg-4 col-md-4 m-auto">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h4>Nama Peminjam</h4>
                  </td>
                  <td class="text-right">
                    <h5>{{ $itemorder->cart->user->nama}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Peminjaman</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ $itemorder->cart->status_cart }}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4>Status Pengambilan</h4>
                  </td>
                  <td class="text-right">
                  <h5>{{ $itemorder->cart->status_peminjaman}}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection