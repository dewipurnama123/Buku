<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Backend\Logincontroller;
use App\Http\Controllers\Backend\Usercontroller;
use App\Http\Controllers\Backend\Kategoricontroller;
use App\Http\Controllers\Backend\Membercontroller;
use App\Http\Controllers\Backend\Bukucontroller;
use App\Http\Controllers\Backend\Transaksicontroller;
use App\Http\Controllers\Backend\Keranjangcontroller;


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


Route::group(['middleware' => 'guest:login'], function (){
    Route::get('/', [Logincontroller::class, 'login'])->name('login');
    Route::post('aksilogin', [Logincontroller::class, 'aksilogin'])->name('aksilogin');
    Route::get('register', [Logincontroller::class, 'register'])->name('register');
    Route::post('daftar',  [Logincontroller::class, 'daftar'])->name('daftar');
});

//Backend
Route::group(['middleware' => ['web', 'auth:login']], function (){
    //home
    Route::get('home', [Homecontroller::class, 'index'])->name('home');

    //tabel user
    Route::get('user', [Usercontroller::class, 'index'])->name('user');
    Route::get('input-user', [Usercontroller::class, 'tambahUser'])->name('input-user');
    Route::post('simpan-user', [Usercontroller::class, 'save'])->name('simpan-user');
    Route::get('edit-user/{id_user}', [Usercontroller::class, 'edituser'])->name('edit-user');
    Route::post('update-user/{id_user}', [Usercontroller::class, 'updateuser'])->name('update-user');
    Route::get('hapus-user/{id_user}', [Usercontroller::class, 'hapususer'])->name('hapus-user');

    //tabel kategori
    Route::get('kategori', [Kategoricontroller::class, 'index'])->name('kategori');
    Route::get('input-kategori', [Kategoricontroller::class, 'tambahkategori'])->name('input-kategori');
    Route::post('simpan-kategori', [Kategoricontroller::class, 'save'])->name('simpan-kategori');
    Route::get('edit-kategori/{id_kategori}', [Kategoricontroller::class, 'editkategori'])->name('edit-kategori');
    Route::post('update-kategori/{id_kategori}', [Kategoricontroller::class, 'updatekategori'])->name('update-kategori');
    Route::get('hapus-kategori/{id_kategori}', [Kategoricontroller::class, 'hapuskategori'])->name('hapus-kategori');

    //tabel member
    Route::get('member', [Membercontroller::class, 'index'])->name('member');
    Route::get('input-member', [Membercontroller::class, 'tambahmember'])->name('input-member');
    Route::post('simpan-member', [Membercontroller::class, 'save'])->name('simpan-member');
    Route::get('edit-member/{id_member}', [Membercontroller::class, 'editmember'])->name('edit-member');
    Route::post('update-member/{id_member}', [Membercontroller::class, 'updatemember'])->name('update-member');
    Route::get('hapus-member/{id_member}', [Membercontroller::class, 'hapusmember'])->name('hapus-member');

    //tabel buku
    Route::get('buku', [Bukucontroller::class, 'index'])->name('buku');
    Route::get('input-buku', [Bukucontroller::class, 'tambahbuku'])->name('input-buku');
    Route::post('simpan-buku', [Bukucontroller::class, 'save'])->name('simpan-buku');
    Route::get('edit-buku/{id_buku}', [Bukucontroller::class, 'editbuku'])->name('edit-buku');
    Route::post('update-buku/{id_buku}', [Bukucontroller::class, 'updatebuku'])->name('update-buku');
    Route::get('hapus-buku/{id_buku}', [Bukucontroller::class, 'hapusbuku'])->name('hapus-buku');

    //tabel transaksi
    Route::get('transaksi', [Transaksicontroller::class, 'index'])->name('transaksi');
    Route::get('input-transaksi', [Transaksicontroller::class, 'tambahtransaksi'])->name('input-transaksi');
    Route::post('simpan-transaksi', [Transaksicontroller::class, 'save'])->name('simpan-transaksi');
    Route::get('edit-transaksi/{id_transaksi}', [Transaksicontroller::class, 'edittransaksi'])->name('edit-transaksi');
    Route::post('update-transaksi/{id_transaksi}', [Transaksicontroller::class, 'updatetransaksi'])->name('update-transaksi');
    Route::get('hapus-transaksi/{id_transaksi}', [Transaksicontroller::class, 'hapustransaksi'])->name('hapus-transaksi');

    //tabel keranjang
    Route::get('keranjang', [Keranjangcontroller::class, 'index'])->name('keranjang');
    Route::get('input-keranjang', [Keranjangcontroller::class, 'tambahkeranjang'])->name('input-keranjang');
    Route::post('simpan-keranjang', [Keranjangcontroller::class, 'save'])->name('simpan-keranjang');
    Route::get('edit-keranjang/{id_keranjang}', [Keranjangcontroller::class, 'editkeranjang'])->name('edit-keranjang');
    Route::post('update-keranjang/{id_keranjang}', [Keranjangcontroller::class, 'updatekeranjang'])->name('update-keranjang');
    Route::get('hapus-keranjang/{id_keranjang}', [Keranjangcontroller::class, 'hapuskeranjang'])->name('hapus-keranjang');
    Route::post('data', [Keranjangcontroller::class, 'data'])->name('data');

    //logout
    Route::post('logout', [Logincontroller::class, 'logout'])->name('logout');
});
