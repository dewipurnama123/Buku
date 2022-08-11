<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use App\Models\Member;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
    $data['kategori'] = DB::table('kategoris')->get();
    $data['buku'] = DB::table('bukus')
    ->paginate(12);

    return view ('frontend.page.homef',$data);

}
public function kategoriF($id){
    $data['kate'] = DB::table('kategoris')->where('kategoris.id_kategori',$id)->first();
    $data['kategori'] = DB::table('kategoris')->get();
    $data['buku'] = DB::table('bukus')
    ->join('kategoris','bukus.id_kategori','=','kategoris.id_kategori')
    ->where('kategoris.id_kategori',$id)
    ->get();
    return view ('frontend.page.kategori',$data);

}

public function edit($id){
    $data['provinces'] = Province::pluck('name', 'province_id');
    $data['member'] = DB::table('members')->where('id',$id)->first();
    $data['kategori'] = DB::table('kategoris')->get();
    $data['cart'] = DB::table('keranjangtmps')
    ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
    ->get();
     return view ('frontend.page.member',$data);

}

public function update(Request $r,$id){
    $validator = Validator::make($r->all(),[
        'username' => 'required',
        'nama' => 'required',
        'province_origin' => 'required',
        'city_origin' => 'required',
        'alamat' => 'required',
        'nohp' => 'required',
        'email' => 'required',
        'password' => 'required',

    ]);

    if ($validator->fails()){
        return redirect('updatemember')
        ->withErrors($validator)
        ->withInput();
    }

    $simpan= Member::where('id',$id)->update([
        'username' => $r->username,
        'nama' => $r->nama,
        'province_id' => $r->province_origin,
        'city_id' => $r->city_origin,
        'alamat' => $r->alamat,
        'nohp' => $r->nohp,
        'email' => $r->email,
        'password' => Hash::make($r->password),
    ]);

    if($simpan == TRUE){
        return redirect ('cart')-> with('success','Data Berhasil Update');
    }else{
        return redirect ('editmember')-> with('error','Data Gagal Update');

    }
}

}
