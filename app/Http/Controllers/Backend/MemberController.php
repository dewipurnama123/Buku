<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $data['provinces'] = Province::pluck('name', 'province_id');
        $data['member'] = DB::table('members')
        // ->join('provinces','members.province_id','=','provinces.province_id')
        // ->join('cities','members.city_id','=','cities.city_id')->get();
        // ->select('provinces.province_id','cities.id','members.id as id_member','members.*')

        // ->get();
        //pagination
       ->simplePaginate(10);
        // singkatan dd adalah dump die
        //dd($data['member']);
        return view('backend.page.member', $data);
    }
    public function tambahmember()
    {
        $data['provinces'] = Province::pluck('name', 'province_id');
        $data['citie']=DB::table('cities')->get();
        return view('backend.page.inputmember',$data);
    }
    public function getCitiesf($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'province_origin' => 'required',
            'city_origin' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-member')
                ->withErrors($validator)
                ->withInput();
        }else{
            $simpan = Member::insert([
                'username' => $r->username,
                'nama' => $r->nama,
                'province_id' => $r->province_origin,
                'city_id' => $r->city_origin,
                'alamat' => $r->alamat,
                'nohp' => $r->nohp,
                'email' => $r->email,
                'password' => $r->password
            ]);
        }

        if ($simpan == TRUE) {
            return redirect('member')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-member')->with('error', 'Data gagal disimpan');
        }
    }
    public function editmember($id)
    {
        $data['member'] = DB::table('members')->where('id',$id)->first();
        $data['provinces'] = Province::pluck('name', 'province_id');
        $data['citie']=DB::table('cities')->get();
        // $data['provinces'] = Province::pluck('name', 'province_id');

        // dd($data['member']);
        return view('backend.page.editmember', $data);
    }
    public function postCitiesf($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }
    public function updatemember(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'province_origin' => 'required',
            'city_origin' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('member')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Member::where('id', $id)->update([
            'username' => $r->username,
            'nama' => $r->nama,
            'province_id' => $r->province_origin,
            'city_id' => $r->city_origin,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'email' => $r->email,
            'password' => $r->password
        ]);
        if ($simpan == TRUE) {
            return redirect('member')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('edit-member')->with('error', 'Data gagal diubah');
        }
    }

    public function hapusmember($id)
    {
        $deleted = DB::table('members')->where('id',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('member')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-member')->with('error', 'Data gagal dihapus');
        }
    }
}
