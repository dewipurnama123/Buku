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
        $data['member'] = DB::table('members')->get();
        // singkatan ddcadalah dump die
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
            'alamat' => 'required',
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
            'nama' => $r->nama,
            'alamat' => $r->alamat,
            'nohp' => $r->nohp,
            'email' => $r->email,
            'password' => $r->password,
        ]);

        if ($simpan == TRUE) {
            return redirect('member')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-member')->with('error', 'Data gagal disimpan');
        }
    }
    public function editmember($id)
    {
        $data['member'] = DB::table('members')->where('id_member', $id)->first();
        return view('backend.page.editmember', $data);
    }
    public function updatemember(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-member')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Member::where('id_member', $id)->update([
            'nama' => $r->nama,
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
        $deleted = DB::table('members')->where('id_member',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('member')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-member')->with('error', 'Data gagal dihapus');
        }
    }
}
