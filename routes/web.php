<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\BukuController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Backend\KeranjangController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\GetApi;
use App\Http\Controllers\Frontend\HomeController as HomeControllerF;
use App\Http\Controllers\Frontend\LoginController as LoginControllerF;
use App\Http\Controllers\Frontend\MemberController as MemberControllerF;
use App\Http\Controllers\Frontend\TransController as TransControllerF;
use App\Http\Controllers\Frontend\PembayaranController as PembayaranControllerF;


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

Route::get('/admin', [HomeController::class, 'index'])->name('admin');


// frontend
if(Auth::user() == null)
{
    Route::get('home',[HomeControllerF::class, 'index'])->name('home') ;
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
<<<<<<< HEAD
    Route::get('loginf',[LogincontrollerF::class, 'loginf'])->name('loginf') ;
    Route::post('aksiloginf', [LogincontrollerF::class, 'aksiloginf'])->name('aksiloginf');
    Route::get('registerf', [LogincontrollerF::class, 'registerf'])->name('registerf');
    Route::post('daftarf',  [LogincontrollerF::class, 'daftarf'])->name('daftarf');

});
Route::group(['middleware' => ['web', 'auth:member']], function (){

=======
    Route::get('/loginf',[LoginControllerF::class, 'loginf'])->name('loginf') ;
    Route::post('aksiloginf', [LoginControllerF::class, 'aksiloginf'])->name('aksiloginf');
    Route::get('registerf', [LoginControllerF::class, 'registerf'])->name('registerf');
    Route::post('daftarf',  [LoginControllerF::class, 'daftarf'])->name('daftarf');
    
});

Route::group(['middleware' => ['web', 'auth:member']], function (){   
>>>>>>> b79f839ca49a842dc76beaee32c5853b14403071
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
Route::post('logoutf', [LoginControllerF::class, 'logoutf'])->name('logoutf');

Route::group(['middleware' => 'guest:login'], function (){
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('aksilogin', [LoginController::class, 'aksilogin'])->name('aksilogin');
    Route::get('register', [LoginController::class, 'register'])->name('register');
    Route::post('daftar',  [LoginController::class, 'daftar'])->name('daftar');
});

//Backend
Route::group(['middleware' => ['web', 'auth:login']], function (){
    //home
    Route::get('admin', [HomeController::class, 'index'])->name('admin');

    //tabel user
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('input-user', [UserController::class, 'tambahUser'])->name('input-user');
    Route::post('simpan-user', [UserController::class, 'save'])->name('simpan-user');
    Route::get('edit-user/{id_user}', [UserController::class, 'edituser'])->name('edit-user');
    Route::post('update-user/{id_user}', [UserController::class, 'updateuser'])->name('update-user');
    Route::get('hapus-user/{id_user}', [UserController::class, 'hapususer'])->name('hapus-user');

    //tabel kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('input-kategori', [KategoriController::class, 'tambahkategori'])->name('input-kategori');
    Route::post('simpan-kategori', [KategoriController::class, 'save'])->name('simpan-kategori');
    Route::get('edit-kategori/{id_kategori}', [KategoriController::class, 'editkategori'])->name('edit-kategori');
    Route::post('update-kategori/{id_kategori}', [KategoriController::class, 'updatekategori'])->name('update-kategori');
    Route::get('hapus-kategori/{id_kategori}', [KategoriController::class, 'hapuskategori'])->name('hapus-kategori');

    //tabel member
    Route::get('member', [MemberController::class, 'index'])->name('member');
    Route::get('input-member', [MemberController::class, 'tambahmember'])->name('input-member');
    Route::post('simpan-member', [MemberController::class, 'save'])->name('simpan-member');
    Route::get('edit-member/{id_member}', [MemberController::class, 'editmember'])->name('edit-member');
    Route::post('update-member/{id_member}', [MemberController::class, 'updatemember'])->name('update-member');
    Route::get('hapus-member/{id_member}', [MemberController::class, 'hapusmember'])->name('hapus-member');

    //tabel buku
    Route::get('buku', [BukuController::class, 'index'])->name('buku');
    Route::get('input-buku', [BukuController::class, 'tambahbuku'])->name('input-buku');
    Route::post('simpan-buku', [BukuController::class, 'save'])->name('simpan-buku');
    Route::get('edit-buku/{id_buku}', [BukuController::class, 'editbuku'])->name('edit-buku');
    Route::post('update-buku/{id_buku}', [BukuController::class, 'updatebuku'])->name('update-buku');
    Route::get('hapus-buku/{id_buku}', [BukuController::class, 'hapusbuku'])->name('hapus-buku');

    //tabel transaksi
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('input-transaksi', [TransaksiController::class, 'tambahtransaksi'])->name('input-transaksi');
    Route::post('simpan-transaksi', [TransaksiController::class, 'save'])->name('simpan-transaksi');
    Route::get('edit-transaksi/{id_transaksi}', [TransaksiController::class, 'edittransaksi'])->name('edit-transaksi');
    Route::post('update-transaksi/{id_transaksi}', [TransaksiController::class, 'updatetransaksi'])->name('update-transaksi');
    Route::get('hapus-transaksi/{id_transaksi}', [TransaksiController::class, 'hapustransaksi'])->name('hapus-transaksi');

    //tabel keranjang
    Route::get('keranjang/{tanggal?}', [KeranjangController::class, 'index'])->name('keranjang');
    Route::get('input-keranjang', [KeranjangController::class, 'tambahkeranjang'])->name('input-keranjang');
    Route::post('simpan-keranjang', [KeranjangController::class, 'save'])->name('simpan-keranjang');
    Route::get('edit-keranjang/{id_keranjang}', [KeranjangController::class, 'editkeranjang'])->name('edit-keranjang');
    Route::post('update-keranjang/{id_keranjang}', [KeranjangController::class, 'updatekeranjang'])->name('update-keranjang');
    Route::get('hapus-keranjang/{id_keranjang}', [KeranjangController::class, 'hapuskeranjang'])->name('hapus-keranjang');
    Route::post('data', [KeranjangController::class, 'data'])->name('data');
    Route::post('filtertgl', [KeranjangController::class, 'filtertanggal'])->name('filtertgl');

    Route::get('/', [GetApi::class, 'index'])->name('index');

    //logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
