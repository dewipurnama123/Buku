<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\Logincontroller;
use App\Http\Controllers\Backend\Usercontroller;
use App\Http\Controllers\Backend\Kategoricontroller;
use App\Http\Controllers\Backend\Membercontroller;
use App\Http\Controllers\Backend\Bukucontroller;
use App\Http\Controllers\Backend\Transaksicontroller;
use App\Http\Controllers\Backend\Keranjangcontroller;
use App\Http\Controllers\Backend\Homecontroller;

use App\Http\Controllers\Frontend\Homecontroller as HomeControllerF;
use App\Http\Controllers\Frontend\Logincontroller as LogincontrollerF;
use App\Http\Controllers\Frontend\Membercontroller as MembercontrollerF;
use App\Http\Controllers\Frontend\Transcontroller as TranscontrollerF;
use App\Http\Controllers\Frontend\PembayaranController as PembayarancontrollerF;


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
// backend
Route::get('/admin', [Homecontroller::class, 'index'])->name('admin');


// frontend
if(Auth::user() == null)
{
    Route::get('/',[HomeControllerF::class, 'index'])->name('home') ;
    Route::get('kategori/{id}',[HomeControllerF::class, 'kategoriF'])->name('kategoriF') ;
    Route::get('detail/{id}',[HomeControllerF::class, 'detail'])->name('detail') ;
    Route::get('about',[HomeControllerF::class, 'about'])->name('about') ;
}else{
    Route::group(['middleware' => ['web', 'auth:member']], function (){
        Route::get('/admin', [Homecontroller::class, 'index'])->name('admin');
        Route::get('kategori/{id}',[HomeControllerF::class, 'kategoriF'])->name('kategoriF') ;
        Route::get('detail/{id}',[HomeControllerF::class, 'detail'])->name('detail') ;
        Route::get('about',[HomeControllerF::class, 'about'])->name('about') ;
    });
}


Route::group(['middleware' => 'guest:member'], function (){
    Route::get('loginf',[LogincontrollerF::class, 'loginf'])->name('loginf') ;
    Route::post('aksiloginf', [LogincontrollerF::class, 'aksiloginf'])->name('aksiloginf');
    Route::get('registerf', [LogincontrollerF::class, 'registerf'])->name('registerf');
    Route::post('daftarf',  [LogincontrollerF::class, 'daftarf'])->name('daftarf');
    
});
Route::group(['middleware' => ['web', 'auth:member']], function (){   
    
    Route::get('cart',[TransControllerF::class, 'cart'])->name('cart') ;
    Route::get('cart1',[TransControllerF::class, 'cart1'])->name('cart1') ;
    Route::post('simpan-cart',[TransControllerF::class, 'keranjang'])->name('simpan-cart') ;
    Route::get('hapus-cart/{id}',[TransControllerF::class, 'hapus'])->name('hapus-cart') ;
    
    Route::get('qtytambah/{id_keranjang}/{id_buku}',[TransControllerF::class, 'qtytambah'])->name('qtytambah') ;
    Route::get('qtykurang/{id_keranjang}/{id_buku}',[TransControllerF::class, 'qtykurang'])->name('qtykurang') ;
    
    Route::get('wishlist',[HomeControllerF::class, 'wishlist'])->name('wishlist') ;
    Route::post('simpan-wish',[HomeControllerF::class, 'wish'])->name('simpan-wish') ;
    Route::get('hapus-wish/{id}',[HomeControllerF::class, 'hapus'])->name('hapus-wish') ;
    
    Route::get('pembayaran',[PembayaranControllerF::class, 'index'])->name('pembayaran') ;
    
});
Route::post('logoutf', [LogincontrollerF::class, 'logoutf'])->name('logoutf');

Route::group(['middleware' => 'guest:login'], function (){
    Route::get('login', [Logincontroller::class, 'login'])->name('login');
    Route::post('aksilogin', [Logincontroller::class, 'aksilogin'])->name('aksilogin');
    Route::get('register', [Logincontroller::class, 'register'])->name('register');
    Route::post('daftar',  [Logincontroller::class, 'daftar'])->name('daftar');
});

//Backend
Route::group(['middleware' => ['web', 'auth:login']], function (){
    //home
    Route::get('admin', [Homecontroller::class, 'index'])->name('admin');

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
