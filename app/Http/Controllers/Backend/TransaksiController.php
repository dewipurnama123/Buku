<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {

        $data['transaksi'] = DB::table('transaksis')
        // singkatan ddcadalah dump die
        //dd($data['transaksi']);
        ->join('members', 'transaksis.id_member','=','members.id')
        // ->get();
        //paginaton
        ->simplePaginate(10);
        return view('backend.page.transaksi', $data);
    }
    public function printtransaksi()
    {
        $data['transaksi'] = DB::table('transaksis')
                            ->join('members', 'transaksis.id_member','=','members.id')
                            // ->join('keranjangs', 'transaksis.id_transaksi','=','keranjangs.id_transaksi')
                            // ->join('keranjangs', 'bukus.id_buku','=','keranjangs.id_buku')
                            ->get();
        // $data['detail'] = DB::table('keranjangs')
        //                     ->join('bukus','keranjangs.id_buku','=','bukus.id_buku')
        //                     ->where('id_transaksi',$id)->get();


        // dd($data['transaksi']);
        $data['member']=DB::table('members')->get();

        return view('backend.page.printtransaksi', $data);
    }
    public function detailtransaksi($id)
    {
        // $id_member = Auth::user()->id;
        // $data['kategori'] = DB::table('kategoris')->get();
        // $data['cart'] = DB::table('keranjangtmps')
        // ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        // ->get();

        $data['transaksi'] = DB::table('transaksis')
        ->where('id_transaksi', $id)->first();
        $data['detail'] = DB::table('keranjangs')
        ->join('bukus','keranjangs.id_buku','=','bukus.id_buku')
        ->where('id_transaksi',$id)
        ->get();
        // $data['member']=DB::table('members')->get();
// dd($data);

        // dd($data['transaksi']);
        return view('backend.page.detailtransaksi', $data);
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
