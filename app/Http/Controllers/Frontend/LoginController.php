<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LoginController extends Controller
{
    public function loginf(){
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view('frontend.auth.login',$data);
    }
    public function registerf(){
        $data['provinces'] = Province::pluck('name', 'province_id');
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view ('frontend.auth.register',$data);
    }
    public function getCitiesf($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    
    public function daftarf(Request $r){
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'nama' => 'required',
            'province_origin' => 'required',
            'city_origin' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }
        

        $simpan = DB::table('members')->insert([
            'username' => $r->username,
            'nama' => $r->nama,
            'province_id' => $r->province_origin,
            'city_id' => $r->city_origin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'email' => $r->email,
            'password' => Hash::make($r->password),
        ]);
  

        if ($simpan == TRUE) {
            return redirect('loginf')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('registerf')->with('error', 'Data gagal disimpan');
        }
    }
    public function aksiloginf(Request $r){
        $login = $r->validate([
            'username' => ['required'],
            'password' => ['required'],
                   ]);
            
        
        if(Auth::guard("member")->attempt($login)){
            $user = DB::table('members')->where('username',$r->username)->first();
            
            if(password_verify($r->password,$user->password))
            {
                $r->session()->put('id_member',$user->id);
                $r->session()->regenerate();
                return redirect('cart');
            }
        }
        return back();
    }

    public function logoutf(Request $r){
        $r->session()->forget('id_member');

        Auth::guard('member')->logout();
        $r->session()->regenerateToken();
        return redirect('home');
    }
  
}
