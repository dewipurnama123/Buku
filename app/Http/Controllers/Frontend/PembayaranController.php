<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Auth;

class PembayaranController extends Controller
{
   
    public function index(){
        $id_member = Auth::user()->id;
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();
       
        $data['pembayaran'] = DB::table('pembayarans')
        ->join('transaksis','pembayarans.id_transaksi','=','transaksis.id_transaksi')->where('id_member',$id_member)
        ->get();
        return view ('frontend.page.pembayaran',$data);
    
    }

   
}
