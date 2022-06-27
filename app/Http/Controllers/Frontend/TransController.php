<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class TransController extends Controller
{
    public function cart(){
        
        $id_member = Auth::user()->id;
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();
        $data['provinces'] = Province::pluck('name', 'province_id');
        
        $dataInv = DB::table('transaksis')->orderBy('id_transaksi','DESC')->first();
        if($dataInv != NULL)
        {
            $kode = $dataInv->invoice + 1;
            $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        }else{
            $kode = 1;$invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
            $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        }
        $data['invoice'] = $invoice;

        return view ('frontend.page.cart',$data);
     /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    }
    
    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }

    public function save(Request $r){
        
        // simpan data ke dalam table transaksi
        $id_member = Auth::user()->id;
        $tgl = date('Y-m-d');
        $invoice = $r->invoice;

        $id_transaksi = DB::table('transaksis')->insertGetId([
            'id_member' => $id_member,
            'tgl' => $tgl,
            'invoice' => $invoice,
            'sub_total' => $r->subtotal,
            'ongkir' => $r->costvalue,
            'tot_bayar' => $r->total
        ]);

        // pindahkan semua data dari table keranjang tmp ke dalam tabel keranjang
        $data = DB::table('keranjangtmps')->get();
        foreach($data as $isi)
        {
            $stok = DB::table('bukus')->where('id_buku',$isi->id_buku)->first();
            $total = $stok->stok - $isi->qty;

            DB::table('bukus')->where('id_buku',$isi->id_buku)->update(['stok' => $total ]);
            DB::table('keranjangs')->insert([
                'id_transaksi' => $id_transaksi,
                'id_member' => $id_member,
                'id_buku' => $isi->id_buku,
                'tgl' => $isi->tgl,
                'qty' => $isi->qty,
                'total' => $isi->total,
                
            ]);
        }

        // setelah data berhasil dipindahkan maka kosongkan kernajang tmp
        $simpan = DB::table('keranjangtmps')->delete();

    if($simpan == TRUE){
        return redirect ('trans')-> with('success','Data Berhasil Disimpan');
    }else{
        return redirect ('cart')-> with('error','Data Gagal Disimpan');

    }
}

    public function cart1(){
        $id_member = Auth::user()->id;
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps') 
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
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

public function transaksi(){
    
    $id_member = Auth::user()->id;
    $data['kategori'] = DB::table('kategoris')->get();
    $data['cart'] = DB::table('keranjangtmps')
    ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
    ->get();

    $data['trans'] = DB::table('transaksis')
    ->get();
    return view ('frontend.page.transaksi',$data);

}
public function dettrans($id){
    $id_member = Auth::user()->id;
    $data['kategori'] = DB::table('kategoris')->get();
    $data['cart'] = DB::table('keranjangtmps')
    ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
    ->get();
    
    $data['trans'] = DB::table('transaksis')->where('transaksis.id_transaksi',$id)->first();
    $data['detail'] = DB::table('keranjangs')
    ->join('bukus','keranjangs.id_buku','=','bukus.id_buku')
    ->where('id_transaksi',$id)->get();
 return view ('frontend.page.dettrans',$data);

}
}
