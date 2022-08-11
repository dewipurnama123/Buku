<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public function payment_handler(Request $request){
        $data  = json_decode($request->getContent());
        $order = DB::table('pembayarans')->where('invoice',$data->order_id)->first();
        $signature_key= hash('sha512', $data->order_id.$data->status_code.$data->gross_amount.'SB-Mid-server-iZPVqYQm-QFKIVAR8HKEbuwP');
        if($signature_key == $data->$signature_key){
            DB::tabel('pembayarans')->where('invoice',$data->order_id)
            ->update([
                'status_code'=>$data->status_code,
                'status_message'=>$data->status_message,
                'transaction_status'=>$data->transaction_status,
            ]);

            DB::tabel('keranjangs')->where('id_member',$order->id)->delete();

            return response()->json(['message' => 'sukses']);
        }else{
            return response()->json(['message'=> 'invalid signature key']);
        }

    }

}
