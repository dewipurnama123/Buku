<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function index()
    {
        $data['keranjang'] = DB::table('keranjangs')
        // singkatan ddcadalah dump die
        //dd($data['keranjang']);
        ->join('transaksis', 'keranjangs.id_transaksi','=','transaksis.id_transaksi')
        ->join('bukus', 'keranjangs.id_buku','=','bukus.id_buku')
        ->get();
        return view('backend.page.keranjang', $data);
    }
    public function tambahkeranjang()
    {
        $data['transaksi']=DB::table('transaksis')->get();
        $data['buku']=DB::table('bukus')->get();
        return view('backend.page.inputkeranjang', $data);
    }
    public function save(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'transaksi_privat'=> 'required',
            'buku_privat'=> 'required',
            'tgl' => 'required',
            'stok' => 'required',
            'ket' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-keranjang')
                ->withErrors($validator)
                ->withInput();
        }

        $simpan = keranjang::insert([
            'id_transaksi' =>$r->transaksi_privat,
            'id_buku' =>$r->buku_privat,
            'tgl' => $r->tgl,
            'stok' => $r->stok,
            'ket' => $r->ket,
            'quantity'=> $r->quantity,
            'harga' => $r->harga,
            'total' => $r->total,
        ]);

        if ($simpan == TRUE) {
            return redirect('keranjang')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('input-keranjang')->with('error', 'Data gagal disimpan');
        }
    }
    public function editkeranjang($id)
    {
        $data['keranjang'] = DB::table('keranjangs')->where('id_keranjang', $id)->first();
        $data['transaksi']=DB::table('transaksis')->get();
        $data['buku']=DB::table('bukus')->get();
        return view('backend.page.editkeranjang', $data);
    }
    public function updatekeranjang(Request $r, $id)
    {

        $validator = Validator::make($r->all(), [
            'transaksi_privat'=> 'required',
            'buku_privat'=> 'required',
            'tgl' => 'required',
            'stok' => 'required',
            'ket' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('input-keranjang')
                ->withErrors($validator)
                ->withInput();
        }
        $simpan = Keranjang::where('id_keranjang', $id)->update([
            'id_transaksi' =>$r->transaksi_privat,
            'id_buku' =>$r->buku_privat,
            'tgl' => $r->tgl,
            'stok' => $r->stok,
            'ket' => $r->ket,
            'quantity'=> $r->quantity,
            'harga' => $r->harga,
            'total' => $r->total
        ]);

        if ($simpan == TRUE) {
            return redirect('keranjang')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('input-keranjang')->with('error', 'Data gagal diubah');
        }
    }

    public function hapuskeranjang($id)
    {
        $deleted = DB::table('keranjangs')->where('id_keranjang',$id)->delete();

        if ($deleted == TRUE) {
            return redirect('keranjang')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('input-keranjang')->with('error', 'Data gagal dihapus');
        }
    }
    public function data(Request $request)
    {
        $id_buku = $request->buku;
        // return response()->json($id_buku);
        $buku= DB::table('bukus')
        ->where('bukus.id_buku',$id_buku)
        ->first();
        // dd($buku);
        $data =[
            'message' => 'ok',
            'data'=> $buku,
        ];
        return response()->json ($data);
    }
}
