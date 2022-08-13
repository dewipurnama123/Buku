<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){
        return view ('backend.auth.login');
    }
    public function register(){
        return view ('backend.auth.register');
    }
    public function daftar(Request $r){
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }

        $simpan = DB::table('logins')->insert([
            'username' => $r->username,
            'nama' =>$r->nama,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);

        if ($simpan == TRUE) {
            return redirect('/')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('register')->with('error', 'Data gagal disimpan');
        }
    }
    public function aksilogin(Request $r){
        $login = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::guard("login")->attempt($login)){
            $r->session()->regenerate();
            return redirect('admin');
        }
        dd($login);
        // return back();
    }

    public function logout(Request $r){
        Auth::guard('login')->logout();
        $r->session()->regenerateToken();
        return redirect('/');
    }
}
