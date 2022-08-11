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
        $data['cart'] = DB::table('keranjangs')
        ->join('bukus','keranjangs.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();

        $data['pembayaran'] = DB::table('pembayarans')
        ->join('transaksis','pembayarans.id','=','transaksis.id_member')->where('id_member',$id_member)
        // ->select('members.id','transaksis.id_transaksi','pembayarans.status_message','pembayarans.status_code', 'pembayarans.total_bayar','pembayarans.invoice','transaksis.asal', 'bukus.judul','pembayarans.payment_type','pembayarans.transaction_id','pembayarans.transaction_time','pembayarans.transaction_status','pembayarans.fraud_status')
        ->get();
        return view ('frontend.page.pembayaran',$data);

    }
    public function get_snap_token(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-iZPVqYQm-QFKIVAR8HKEbuwP';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = DB::table('members')->where('id', $request->id)->first();

        $params = array(
            'transaction_details' => array(
                'order_id' => 'INV'.time(),
                'gross_amount' => $request->tot_bayar,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->nohp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);

        $data = [
            'status' => 'ok',
            'snaptoken' => $snapToken,
        ];
        return response()->json($data);
    }
    public function send_result_midtrans(Request $request)
    {
        $id= Auth::user()->id;
        $city = DB::table('cities')->where('city_id', Auth::user()->city_id)->first();
        $tujuan=$city->name;
        // $transaksi= DB::table('transaksis')
        // ->join('pembayarans','transaksis.id_transaksi','=','pembayarans.id_transaksi')
        // ->where('pembayarans.id_transaksi',$id)
        // ->first();
        $json = json_decode($request->json);
        $asal="Tanggerang";
        // dd($json);
        $simpan = DB::table('pembayarans')->insert([
            'id'=>$id,
            'total_bayar'=>$json->gross_amount,
            'invoice'=>$json->order_id,
            'asal'=>$asal,
            'tujuan'=>$tujuan,
            // 'kurir'=>$request->courier,
            // 'ongkir'=>$request->hasil_ongkir,
            'status_code' => $json->status_code,
            'status_message' => $json->status_message,
            'transaction_id' => $json->transaction_id,
            'payment_type' => $json->payment_type,
            'transaction_time' => $json->transaction_time,
            'transaction_status'=>$json->transaction_status,
            'fraud_status' =>$json->fraud_status,
            // 'bill_key'=>$json->bill_key,
            // 'biller_code'=>$json->biller_code,
            // 'pdf_url'=>$json->pdf_url,
            // 'finish_redirect_url'=>$json->finish_redirect_url,
        ]);
        // dd($simpan);
        if($simpan==TRUE){
            return redirect('cart')->with('Success','Permintaan Anda sedang di proses');
        }else{
            return redirect('penjualan')->with('Error','Permintaan Gagal');
        }
    }


}
