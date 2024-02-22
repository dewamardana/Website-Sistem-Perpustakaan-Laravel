<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('role', 'member')->get();
        return view('dashboard.user.index',[
          'title' => 'Data User',
          'user' => $user,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', [
          'title' => 'Detail Data User',
          'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

      
        return view('dashboard.user.edit',[
          'title' => 'Edit Data User',
          'u' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
        'nisn' =>  'required',
        'nama' =>  'required',
        'email' => 'required',
        'telpon' => 'required',
      ];

      $item = $request->validate($rules);
      User::where('id', $user->id)->update($item);
      
      return redirect('/dashboard/user')->with('berhasil','Data User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemkategori = user::findOrFail($id);//cari berdasarkan id = $id, 
        $c = Cart::where('user_id', $id)->where('status_pengembalian', 'belum')->get()->count();
        // kalo ga ada error page not found 404
        if ($c > 0) {
            // dicek dulu, kalo ada produk di dalam kategori maka proses hapus dihentikan
            return back()->with('error', 'User Memiliki Buku yang Belum Dikembalikan, proses dihentikan');
        } else {
            if ($itemkategori->delete()) {
                return back()->with('berhasil', 'Data berhasil dihapus');
            } else {
                return back()->with('error', 'Data gagal dihapus');
            }
        }
    }
}
