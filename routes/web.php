<?php


use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);
Route::get('/buku/{buku:slug}', [HomepageController::class, 'show']);
Route::get('/kategori/{kategori:slug}', [HomepageController::class, 'kategori']);
Route::get('/penerbit/{penerbit:kode_penerbit}', [HomepageController::class, 'penerbit']);
Route::get('/cari', [HomepageController::class, 'cari']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::group(['middleware' => 'Admin'], function() {
Route::get('/dashboard' , [DashboardController::class, 'index']);;
Route::get('/dashboard/buku/checkSlug', [BukuController::class, 'checkSlug']);
Route::get('/dashboard/kategori/checkSlug', [KategoriController::class, 'checkSlug']);


Route::resource('/dashboard/buku', BukuController::class);
Route::resource('/dashboard/kategori', KategoriController::class);
Route::resource('/dashboard/penerbit', PenerbitController::class);
Route::resource('/dashboard/user', UserController::class);
});

Route::group(['middleware' => 'auth'], function() {
Route::resource('/cart', CartController::class);
Route::patch('/kosongkan/{id}', [CartController::class, 'kosongkan']);
  // cart detail
Route::resource('/cartdetail', CartDetailController::class);
Route::resource('/pinjam', PeminjamanController::class);
});