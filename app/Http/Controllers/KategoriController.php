<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Kategori::orderBy('created_at', 'desc')->paginate(40);
        return view('dashboard.kategori.index',[
          'title' => 'Data Kategori',
          'kategori' => $item,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create',[
          'title' => 'Tambah Data Kategori',
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
        'kode_kategori' => 'required|max:20|unique:kategoris',
        'nama_kategori' =>  'required',
        'image' => 'image|file|max:3000',
        'slug' => 'required|unique:kategoris',
        'deskripsi_kategori' => 'required|max:255',
      ]);

      if ($request->file('image')) {
        $item['image'] = $request->file('image')->store('image-buku');
      }
      $item['user_id'] = auth()->user()->id;
      $item['status'] = 'publish';

      Kategori::create($item);
      
      return redirect('/dashboard/kategori')->with('berhasil','Data Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('dashboard.kategori.show', [
          'title' => 'Detail Kategori',
          'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit',[
          'title' => 'Edit Data Kategori',
          'k' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
        'nama_kategori' =>  'required',
        'image' => 'image|file|max:3000',
        'deskripsi_kategori' => 'required|max:255',
        'status' => 'required',
      ];

      if($request->slug != $kategori->slug){
        $rules['slug'] =  'required|unique:kategoris';
      }
      $item = $request->validate($rules);

      if ($request->file('image')) {
          if($kategori->image){
            Storage::delete($kategori->image);
          }
        $item['image'] = $request->file('image')->store('image-buku');
      }

      $item['user_id'] = auth()->user()->id;

      Kategori::where('id', $kategori->id)->update($item);
      
      return redirect('/dashboard/kategori')->with('berhasil','Data kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      
    $itemkategori = Kategori::findOrFail($id);//cari berdasarkan id = $id, 
    $c = Buku::where('kategori_id', $id)->get()->count();
      if($itemkategori->image){
            Storage::delete($itemkategori->image);
          }
        // kalo ga ada error page not found 404
        if ($c > 0) {
            // dicek dulu, kalo ada produk di dalam kategori maka proses hapus dihentikan
            return back()->with('error', 'Hapus dulu Buku di dalam kategori ini, proses dihentikan');
        } else {
            if ($itemkategori->delete()) {
                return back()->with('berhasil', 'Data berhasil dihapus');
            } else {
                return back()->with('error', 'Data gagal dihapus');
            }
        }
      }


      public function checkSlug(Request $request){
      $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama_kategori);
      return response()->json(['slug' => $slug]);
    }
    
}
