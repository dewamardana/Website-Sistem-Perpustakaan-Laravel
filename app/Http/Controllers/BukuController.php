<?php

namespace App\Http\Controllers;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *`
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itembuku = Buku::orderBy('created_at', 'desc')->paginate(40);
        return view('dashboard.buku.index',[
          'title' => 'Data Buku',
          'buku' => $itembuku,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buku.create',[
          'title' => 'Tambah Data Buku',
          'kategori' => Kategori::all(),
          'penerbit' => Penerbit::all(),
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


        $itemBuku = $request->validate([
        'kode_buku' => 'required|unique:bukus|max:20',
        'judul' =>  'required',
        'slug' => 'required|unique:bukus',
        'image' => 'image|file|max:3000',
        'deskripsi' => 'required|max:255',
        'kategori_id' => 'required',
        'penulis' => 'required',
        'penerbit_id' => 'required',
      ]);

      if ($request->file('image')) {
        $itemBuku['image'] = $request->file('image')->store('image-buku');
      }

      $itemBuku['user_id'] = auth()->user()->id;
      $itemBuku['status'] = 'publish';

      Buku::create($itemBuku);
      
      return redirect('/dashboard/buku')->with('berhasil','Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('dashboard.buku.show', [
          'title' => 'Detail Buku',
          'buku' => $buku,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('dashboard.buku.edit',[
          'title' => 'Edit Data Buku',
          'buku'     => $buku,
          'kategori' => Kategori::all(),
          'penerbit' => Penerbit::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
      
        $rules = [
        'judul' =>  'required',
        'image' => 'image|file|max:3000',
        'deskripsi' => 'required|max:255',
        'kategori_id' => 'required',
        'penulis' => 'required',
        'penerbit_id' => 'required',
        'status' => 'required',
      ];

      if($request->slug != $buku->slug){
        $rules['slug'] =  'required|unique:bukus';
      }
      
      $itemBuku = $request->validate($rules);

      if ($request->file('image')) {
          if($buku->image){
            Storage::delete($buku->image);
          }
        $itemBuku['image'] = $request->file('image')->store('image-buku');
      }

      $itemBuku['user_id'] = auth()->user()->id;

      Buku::where('id', $buku->id)->update($itemBuku);
      
      return redirect('/dashboard/buku')->with('berhasil','Data Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
      if($buku->image){
            Storage::delete($buku->image);
          }
      
      Buku::destroy($buku->id);
      
      return redirect('/dashboard/buku')->with('berhasil','Data Buku Berhasil Dihapus');
    }


    public function checkSlug(Request $request){
      $slug = SlugService::createSlug(Buku::class, 'slug', $request->judul);
      return response()->json(['slug' => $slug]);
    }
}
