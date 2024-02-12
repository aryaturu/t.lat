<?php

use App\Http\Controllers\KategoriCon;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\UserCon;
use App\Http\Controllers\KeranjangCon;
use App\Http\Controllers\UserOrderCon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', function () {
    return view('welcome');
});

Route::get('/user', [UserCon::class, 'index'])->name('indexUser');
Route::get('/user/input', [UserCon::class, 'input'])->name('inputUser');
Route::post('/user/storeinput', [UserCon::class, 'storeinput'])->name('storeInputUser');
Route::get('/user/update/{id}', [UserCon::class, 'update'])->name('updateUser');
Route::post('/user/storeupdate', [UserCon::class, 'storeupdate'])->name('storeUpdateUser');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser');

Route::get('/produk',[ProdukCon::class, 'index'])->name('indexProduk');
Route::get('/produk/input', [ProdukCon::class, 'input'])->name('inputProduk');
Route::post('/produk/storeinput', [ProdukCon::class, 'storeinput'])->name('storeInputProduk');
Route::get('/produk/update/{id}', [ProdukCon::class, 'update'])->name('updateProduk');
Route::post('/produk/storeupdate', [ProdukCon::class, 'storeupdate'])->name('storeUpdateProduk');
Route::get('/produk/delete/{id}', [ProdukCon::class, 'delete'])->name('deleteProduk');

Route::get('/kategori',[KategoriCon::class, 'index'])->name('indexKategori');
Route::get('/kategori/input', [KategoriCon::class, 'input'])->name('inputKategori');
Route::post('/kategori/storeinput', [KategoriCon::class, 'storeinput'])->name('storeInputKategori');
Route::get('/kategori/update/{id}', [KategoriCon::class, 'update'])->name('updateKategori');
Route::post('/kategori/storeupdate', [KategoriCon::class, 'storeupdate'])->name('storeUpdateKategori');
Route::get('/kategori/delete/{id}', [KategoriCon::class, 'delete'])->name('deleteKategori');

Route::get('/keranjang',[KeranjangCon::class, 'index'])->name('indexKeranjang');
Route::get('/keranjang/input', [keranjangCon::class, 'input'])->name('inputKeranjang');
Route::post('/keranjang/storeinput', [KeranjangCon::class, 'storeinput'])->name('storeInputKeranjang');
Route::get('/keranjang/update/{id}', [KeranjangCon::class, 'update'])->name('updateKeranjang');
Route::post('/keranjang/storeupdate', [KeranjangCon::class, 'storeupdate'])->name('storeUpdateKeranjang');
Route::get('/keranjang/delete/{id}', [KeranjangCon::class, 'delete'])->name('deleteKeranjang');

Route::get('/userorder',[UserOrderCon::class, 'index'])->name('indexUserorder');
Route::get('/userorder/input', [UserOrderCon::class, 'input'])->name('inputUserorder');
Route::post('/userorder/storeinput', [UserOrderCon::class, 'storeinput'])->name('storeInputUserorder');
Route::get('/userorder/update/{id}', [UserOrderCon::class, 'update'])->name('updateUserorder');
Route::post('/userorder/storeupdate', [UserOrderCon::class, 'storeupdate'])->name('storeUpdateUserorder');
Route::get('/userorder/delete/{id}', [UserOrderCon::class, 'delete'])->name('deleteUserorder');