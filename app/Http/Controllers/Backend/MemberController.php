<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $data['member'] = DB::table('members')
        // ->get();
        //pagination
        ->simplePaginate(4);
        // singkatan dd adalah dump die
        //dd($data['member']);
        return view('backend.page.member', $data);
    }
    public function tambahmember()
    {
        return view('backend.page.inputmember');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-member')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Member::insert([
            'username' => $r->username,
            'nama' => $r->nama,
            'province_id'=> $r->province_id,
            'city_id'=> $r->city_id,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'email' => $r->email,
            'password' => $r->password
        ]);

        if ($simpan == TRUE) {
            return redirect('member')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-member')->with('error', 'Data gagal disimpan');
        }
    }
    public function editmember($id)
    {
        $data['member'] = DB::table('members')->where('id', $id)->first();
        return view('backend.page.editmember', $data);
    }
    public function updatemember(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-member')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Member::where('id', $id)->update([
            'username' => $r->username,
            'nama' => $r->nama,
            'province_id'=> $r->province_id,
            'city_id'=> $r->city_id,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'email' => $r->email,
            'password' => $r->password
        ]);
        if ($simpan == TRUE) {
            return redirect('member')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-member')->with('error', 'Data gagal diubah');
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
