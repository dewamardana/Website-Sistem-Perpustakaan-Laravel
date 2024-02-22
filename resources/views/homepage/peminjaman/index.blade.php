@extends('layout.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="data">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
              <thead>
                <tr>
                  <th><h4>No</h4></th>
                  <th><h4>Id Pesanan</h4></th>
                  <th><h4>Status Peminjaman</h4></th>
                  <th><h4>Status Pengambilan</h4></th>
                  <th><h4>tanggal Kembali</h4></th>
                  <th><h4>Status Pengembalian</h4></th>
                  <th><h4>Dikembalikan Pada</h4></th>
                  <th><h4>Denda</h4></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder as $order)
                <tr>
                  <td>
                    <h5>{{ $loop->iteration }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->id }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->status_cart }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->status_peminjaman }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->tanggal_kembali }}</h5>
                  </td>
                  <td>
                    <h5>{{ $order->cart->status_pengembalian }}</h5>
                  </td>   
                  <td>
                    <h5>{{ $order->cart->dikembalikan_pada }}</h5>
                  </td>  
                  <td>
                    <h5>{{ $order->cart->denda }}</h5>
                  </td>              
                  <td>
                    <a href="/pinjam/{{$order->id}}" class="tombol btn-sm btn-primary">Detail</a>
                    @if($itemuser->role == 'admin')
                    <a href="{{ route('pinjam.edit', $order->id) }}" class="tombol btn-sm btn-warning mb-2">
                      Edit
                    </a>
                    @endif
                    @if($order->cart->status_pembayaran == 'sudah')
                    <a href="{{ route('review.create',  $order->id)}}" class="tombol btn-sm btn-primary mb-2" onclick="d">
                      Tambahkan Komentar
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection