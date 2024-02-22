<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Cart;
use App\Models\Buku;
use App\Http\Requests\StoreCartDetailRequest;
use App\Http\Requests\UpdateCartDetailRequest;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCartDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartDetailRequest $request)
    {
        $this->validate($request, [
            'buku_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Buku::findOrFail($request->buku_id);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login
        $cart = Cart::where('user_id', $itemuser->id)
                    ->where('status_cart', 'cart')
                    ->first();
        if ($cart) {
            $itemcart = $cart;
        } else {

            $inputancart['user_id'] = $itemuser->id;
            $inputancart['status_cart'] = 'cart';
            $inputancart['status_peminjaman'] = 'belum';
            $inputancart['denda'] = '0';
            
            $itemcart = Cart::create($inputancart);
        }
        // cek dulu apakah sudah ada produk di shopping cart
        $cekdetail = CartDetail::where('cart_id', $itemcart->id)
                                ->where('buku_id', $itemproduk->id)
                                ->first();
        
        if ($cekdetail) {
            // update detail di table cart_detail
            $cekdetail;
        } else {
            $inputan = $request->all();
            $inputan['cart_id'] = $itemcart->id;
            $inputan['produk_id'] = $itemproduk->id;
            CartDetail::create($inputan);
            // update subtotal dan total di table cart
        }
        return redirect('/cart')->with('success', 'Produk berhasil ditambahkan ke cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartDetailRequest  $request
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartDetailRequest $request, CartDetail $cartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        // update total cart dulu
        if ($itemdetail->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }
}
