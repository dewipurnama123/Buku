<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data['transaksi'] = DB::table('transaksis')
        // singkatan ddcadalah dump die
        //dd($data['transaksi']);
        ->join('members', 'transaksis.id_member','=','members.id_member')
        ->get();
        return view('backend.page.transaksi', $data);
    }
    public function tambahtransaksi()
    {
        $data['member']=DB::table('members')->get();
        return view('backend.page.inputtransaksi', $data);
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'member_privat'=> 'required',
            'tgl' => 'required',
            'invoice' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-transaksi')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = transaksi::insert([
            'id_member' =>$r->member_privat,
            'tgl' => $r->tgl,
            'invoice' => $r->invoice,
        ]);

        if ($simpan == TRUE) {
            return redirect('transaksi')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-transaksi')->with('error', 'Data gagal disimpan');
        }
    }
    public function edittransaksi($id)
    {
        $data['transaksi'] = DB::table('transaksis')->where('id_transaksi', $id)->first();
        $data['member']=DB::table('members')->get();
        return view('backend.page.edittransaksi', $data);
    }
    public function updatetransaksi(Request $r, $id)
    {

        if($r->file('gambar') == NULL){
            $simpan = transaksi::where('id_transaksi', $id)->update([
                'id_member' =>$r->member_privat,
                'tgl' => $r->tgl,
                'invoice' => $r->invoice,
            ]);
        }

        if ($simpan == TRUE) {
            return redirect('transaksi')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-transaksi')->with('error', 'Data gagal diubah');
        }
    }

    public function hapustransaksi($id)
    {
        $deleted = DB::table('transaksis')->where('id_transaksi',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('transaksi')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-transaksi')->with('error', 'Data gagal dihapus');
        }
    }
}
