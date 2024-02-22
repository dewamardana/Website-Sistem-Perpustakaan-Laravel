<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;

class HomepageController extends Controller
{
    public function index() {
      return view('homepage/index',[
      "title" => "Homepage",
      "terbaru" => Buku::orderBy('created_at', 'desc')->limit(6)->with(['kategori','penerbit'])->get(),
      "terlaris" => Buku::where('status', 'terlaris')->orderBy('created_at', 'desc')->limit(6)->with(['kategori','penerbit'])->get(),
      "terbatas" => Buku::where('status', 'terbatas')->orderBy('created_at', 'desc')->limit(6)->with(['kategori','penerbit'])->get(),
      "kategori" => Kategori::all(),
      "penerbit" => Penerbit::all(),
      ]);
    }


    public function kategori(Kategori $kategori) {
      return view('homepage/kategori', [
        'title' => "Kategori",
        'info' => $kategori->nama_kategori,
        'kategori'  => $kategori->buku->load('penerbit'),
      ]);
    }

        public function penerbit(Penerbit $penerbit) {
      return view('homepage/penerbit', [
        'title' => "Penerbit",
        'info' => $penerbit->nama,
        'penerbit'  => $penerbit->buku->load('kategori','penerbit'),
      ]);
    }


      public function show(Buku $buku) {
      return view('homepage/lihat', [
      'title' => "Info Buku",
      'info' => $buku->judul,
      'book'  => $buku->load('kategori','penerbit'),
    ]);
    }

    public function cari(Request $request){
      $hasil = Buku::latest()->filter(request(['cari']))->get();
        return view('homepage.cari', [ 
          "title" => "Hasil Pencarian : $request->cari",
          "hasil" =>  $hasil,
        ]);
    }

}


