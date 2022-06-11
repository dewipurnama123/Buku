<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = DB::table('users')
        // ->get();
        //pagination
        ->simplePaginate(2);
        // singkatan ddcadalah dump die
        //dd($data['user']);
        return view('backend.page.user', $data);
    }
    public function tambahUser()
    {
        return view('backend.page.inputuser');
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = User::insert([
            'username' => $r->username,
            'password' => $r->password,
            'email' => $r->email,
        ]);

        if ($simpan == TRUE) {
            return redirect('user')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-user')->with('error', 'Data gagal disimpan');
        }
    }
    public function edituser($id)
    {
        $data['user'] = DB::table('users')->where('id_user', $id)->first();
        return view('backend.page.edituser', $data);
    }
    public function updateuser(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-user')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = User::where('id_user', $id)->update([
            'username' => $r->username,
            'password' => $r->password,
            'email' => $r->email
        ]);
        if ($simpan == TRUE) {
            return redirect('user')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-user')->with('error', 'Data gagal diubah');
        }
    }

    public function hapususer($id)
    {
        $deleted = DB::table('users')->where('id_user',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('user')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-user')->with('error', 'Data gagal dihapus');
        }
    }
}
