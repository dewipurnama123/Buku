<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Homecontroller;
use App\Http\Controllers\Frontend\Homecontroller as HomeControllerF;


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
Route::get('/',[HomeControllerF::class, 'index'])->name('home') ;

