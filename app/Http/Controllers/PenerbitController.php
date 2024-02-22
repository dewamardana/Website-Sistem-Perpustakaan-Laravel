<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Penerbit::orderBy('created_at', 'desc')->paginate(40);
        return view('dashboard.penerbit.index',[
          'title' => 'Data Penerbit',
          'penerbit' => $item,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.penerbit.create',[
          'title' => 'Tambah Data Penerbit',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->validate([
        'kode_penerbit' => 'required|max:20|unique:penerbits',
        'nama' =>  'required',
        'alamat' => 'required',
        'telpon' => 'required|max:20',
        'image' => 'image|file|max:3000',
      ]);

      if ($request->file('image')) {
        $item['image'] = $request->file('image')->store('image-buku');
      }


      Penerbit::create($item);
      
      return redirect('/dashboard/penerbit')->with('berhasil','Data Penerbit Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        return view('dashboard.penerbit.show', [
          'title' => 'Detail Data Penerbit',
          'penerbit' => $penerbit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        return view('dashboard.penerbit.edit',[
          'title' => 'Edit Data Penerbit',
          'p' => $penerbit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $rules = [
        'nama' =>  'required',
        'alamat' => 'required|max:255',
        'telpon' => 'required',
        'image' => 'image|file|max:3000',
      ];

      $item = $request->validate($rules);

      if ($request->file('image')) {
          if($penerbit->image){
            Storage::delete($penerbit->image);
          }
        $item['image'] = $request->file('image')->store('image-buku');
      }

      Penerbit::where('id', $penerbit->id)->update($item);
      
      return redirect('/dashboard/penerbit')->with('berhasil','Data Penerbit Berhasil Diupdate');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemPenerbit = Penerbit::findOrFail($id);//cari berdasarkan id = $id,
        if($itemPenerbit->image){
            Storage::delete($itemPenerbit->image);
          } 
        $c = Buku::where('penerbit_id', $id)->get()->count();
        // kalo ga ada error page not found 404
        if ($c > 0) {
            // dicek dulu, kalo ada produk di dalam kategori maka proses hapus dihentikan
            return back()->with('error', 'Hapus dulu data Buku di dalam Penerbit ini, proses dihentikan');
        } else {
            if ($itemPenerbit->delete()) {
                return back()->with('berhasil', 'Data berhasil dihapus');
            } else {
                return back()->with('error', 'Data gagal dihapus');
            }
        }
    }
}
