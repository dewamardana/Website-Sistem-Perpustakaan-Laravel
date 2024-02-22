<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
      return view('auth.sign', [
        'title' => 'Halaman Login'
      ]);
    }


    public function auth(Request $request){

      $credentials = $request->validate([
        'nisn' => 'required',
        'password' => 'required'
      ]);

      if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role !== 'admin'){
              return redirect()->intended('/');
            
            }else{
              return redirect()->intended('/dashboard');
            }
            
        }
        return back()->with('gagal', 'Login Gagal');

    }

    public function logout(Request $request){
    
      Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

    return redirect('/');
      
    }

}