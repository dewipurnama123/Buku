<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Sendmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Hash;

class LupapasswordController extends Controller
{
    public function resetPassword(Request $r){
        $username = $r->email;
        $cek = DB::table('members')
                ->where('email',$username)
                ->first();
        if(!$cek){
            return back()->with('pesan', 'Pastikan email sudah benar!');
        }
        $id = encrypt($cek->id);
        $datamail = [
            'nama' => $cek->nama,
            'pesan' => 'Tombol Diatas Merupakan Link Untuk Mereset Password anda, Jika Anda Tidak Meminta Reset Password Silahkan Abaikan Email Ini',
            'dari' => 'Sari Angrek',
            'url' => url('password-reset/'.$id),
            'pengembang' => 'Suport Sari Angrek',
        ];
        
        Mail::to($cek->email)->send(new Sendmail($datamail));


        return redirect('/');
    }

    public function halamanReset($id){
        $data['id'] = decrypt($id);
        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view('mail.reset',$data);
    }

    public function updatePassword(Request $r,$id){
        if ($r->password == $r->password1) {
            $pass = Hash::make($r->password);
            DB::table('members')
            ->where('id',$id)
            ->update([
                'password' => $pass
            ]);
            return redirect('/');
        }else {
            return back()
            ->with('pesan','Password Tidak Sama');
        }
    }
}
