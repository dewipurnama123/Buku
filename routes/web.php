<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Backend\Logincontroller;
use App\Http\Controllers\Backend\Usercontroller;


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
    //logout
    Route::post('logout', [Logincontroller::class, 'logout'])->name('logout');
});

