<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Cart;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Illuminate\Http\Request;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            // kalo admin maka menampilkan semua cart
            $itemorder = Peminjaman::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'dipinjam');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        } else {
            // kalo member maka menampilkan cart punyanya sendiri
            $itemorder = Peminjaman::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'dipinjam');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        }
        $data = array('title' => 'Data Peminjaman',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser);
        return view('homepage.peminjaman.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'cart')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {

            // buat variabel inputan order
                $input['cart_id'] = $itemcart->id;
                $input['nama'] = $itemuser->nama;
                $input['email'] = $itemuser->email;
                $input['nisn'] = $itemuser->nisn;
                $input['telpon'] = $itemuser->telpon;
                
                Peminjaman::create($input);//simpan order
                // update status cart
                $itemcart->update(['status_cart' => 'dipinjam']);
                $itemcart->update(['status_pengembalian' => 'belum']);
                
                return redirect('/pinjam')->with('success', 'Order berhasil disimpan');
        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Peminjaman $peminjaman, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = Peminjaman::findOrFail($id);
            $data = array('title' => 'Detail Peminjaman',
                        'itemorder' => $itemorder);
            return view('homepage.peminjaman.show', $data)->with('no', 1);            
        } else {
            $itemorder = Peminjaman::where('id', $id)
                            ->whereHas('cart', function($q) use ($itemuser) {
                                $q->where('user_id', $itemuser->id);
                            })->first();
            if ($itemorder) {
                $data = array('title' => 'Detail Peminjaman',
                            'itemorder' => $itemorder);
                return view('homepage.peminjaman.show', $data)->with('no', 1);                            
            } else {
                return abort('404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Peminjaman $peminjaman, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'admin') {
            $itemorder = Peminjaman::findOrFail($id);
            $data = array('title' => 'Edit Data Peminjaman',
                        'itemorder' => $itemorder);
            return view('homepage.peminjaman.edit', $data)->with('no', 1);            
        } else {
            return abort('404');//kalo bukan admin maka akan tampil error halaman tidak ditemukan
        }
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
      $rules = [
        'status_peminjaman' => 'required',
        'status_pengembalian' => 'required',
        'denda' => 'required',
      ];

      if($request->status_peminjaman === 'sudah'){
        $rules['tanggal_kembali'] =  'required';
      }

      
      if($request->status_pengembalian === 'sudah'){
        $rules['dikembalikan_pada'] =  'required';
        
      }
      $itemBuku = $request->validate($rules);


        $itemorder = Peminjaman::findOrFail($id);
        $itemorder->cart->update($itemBuku);
        return back()->with('success','Order berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
