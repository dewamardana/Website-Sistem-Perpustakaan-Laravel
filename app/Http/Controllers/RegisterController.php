<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Flash;

class RegisterController extends Controller
{
    public function index() {
      return view('auth.signup', [
        'title' => ' Halaman Register',
      ]);
    }

    public function store(Request $request){

      $itemUser = $request->validate([
        'nama' => 'required|min:4|max:255',
        'nisn' =>  'required|unique:users',
        'email' => 'required|email:dns|unique:users',
        'telpon' => 'required',
        'password' => 'required|min:5',
      ]);

      $itemUser['password'] = Hash::make($itemUser['password']);
      User::create($itemUser);
      
      session()->flash('berhasil', 'Registrasi Berhasil');

      return redirect('/login');
    }
}
