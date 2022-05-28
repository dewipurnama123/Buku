<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Auth;

class TransController extends Controller
{
    public function cart(){
        $id_member = Auth::user()->id;
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();
        return view ('frontend.page.cart',$data);
    
    }
    public function cart1(){
        $id_member = Auth::user()->id;
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps') 
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->paginate(3);
        return view ('frontend.template',$data);
        
    }
    public function keranjang(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_buku' => 'required'
            
        ]);
    
        if ($validator->fails()){
            return redirect('cart')
            ->withErrors($validator)
            ->withInput();
        }else{
            $id_member = Auth::user()->id;
            // ambil harga barang dari id barang
            $barang = DB::table('bukus')->where('id_buku',$r->id_buku)->first();
            // stelah data hargabarang di dapat maka jumlah dikali harga
            $harga = $barang->harga;
            
            $total = $harga * $r->qty;

            // cek id buku yang sama
            $cek = DB::table('keranjangtmps')-> where('id_buku',$r->id_buku)
            ->where('id_member',$id_member)->first();
            // jika buku telah ada maka update qty
            if($cek==TRUE){
               $simpan= DB::table('keranjangtmps')->where('id_keranjang',$cek->id_keranjang)
                ->update([
                    'qty' => $cek->qty+1, 
                    'total' => $cek->total+$harga,
                    

                ]); 
            }else{    
                $simpan= DB::table('keranjangtmps')->insert([
                    'id_member'=> $id_member,
                    'id_buku'=> $r->id_buku,
                    'tgl'=> date('Y-m-d'),
                    'qty'=> $r->qty,
                    'total'=> $total,
                    
                ]);
            }
        }
    
        if($simpan == TRUE){
            return redirect ('cart')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('cart')-> with('error','Data Gagal Disimpan');
        }
    }
    public function hapus($id)
    {
        $hapus = DB::table('keranjangtmps')->where('id_keranjang',$id)->delete();
        if ($hapus==TRUE){
            return redirect('cart')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect('cart')->with('error','Data Gagal Dihapus');
        }
    }

    public function qtytambah($id_keranjang,$id_buku)
    {
        //ambil id_buku, id_keranjang, id_member
        $id_member = Auth::user()->id;

        //buka tabel keranjangtmps berdasarkan id_kerjanng
        $keranjang = DB::table('keranjangtmps')->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->where('id_keranjang',$id_keranjang)->first();
        
        //munculkan qty berdasarkan id_buku
        $qty = $keranjang->qty;
        //tambah qty (+1)
        $total = $qty+1;

        $harga = $keranjang->harga;
        $ttl= $total*$harga;
        //update
        $update=DB::table('keranjangtmps')->where('id_keranjang',$id_keranjang)->update(['qty'=>$total,'total'=>$ttl]);
        return back();
    }
public function qtykurang($id_keranjang,$id_buku){
    $id_member = Auth::user()->id;
    $keranjang = DB::table('keranjangtmps')->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
    ->where('id_keranjang',$id_keranjang)->first();

    $qty = $keranjang->qty;
    $total =$qty-1;
    if($total<=0){
        DB::table('keranjangtmps')->where('id_keranjang',$id_keranjang)->delete();
    }else{

        $harga = $keranjang->harga;
        $ttl= $total*$harga;
        
        $update=DB::table('keranjangtmps')->where('id_keranjang',$id_keranjang)->update(['qty'=>$total,'total'=>$ttl]);
    }
   
    return back();
}

}
