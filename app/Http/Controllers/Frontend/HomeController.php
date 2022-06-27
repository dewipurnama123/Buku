<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Auth;


class HomeController extends Controller
{
    public function index(){
        $data['kategori'] = DB::table('kategoris')->get();
        $data['buku'] = DB::table('bukus')
        ->paginate(12);
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        
        return view ('frontend.page.home',$data);
        
    }
    public function kategoriF($id){
        $data['kate'] = DB::table('kategoris')->where('kategoris.id_kategori',$id)->first();
        $data['kategori'] = DB::table('kategoris')->get();
        $data['buku'] = DB::table('bukus')
        ->join('kategoris','bukus.id_kategori','=','kategoris.id_kategori')
        ->where('kategoris.id_kategori',$id)
        ->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view ('frontend.page.kategori',$data);
        
    }
    public function detail($id){
        
        $data['kategori'] = DB::table('kategoris')->get();
        $data['buku'] = DB::table('bukus')
        ->join('kategoris','bukus.id_kategori','=','kategoris.id_kategori')
        ->where('bukus.id_buku',$id)->first();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view ('frontend.page.detail',$data);
        
    }
   
    public function about(){

        $data['kategori'] = DB::table('kategoris')->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')
        ->get();
        return view ('frontend.page.about',$data);
        
    }
    public function wishlist(){
        $id_member = Auth::user()->id;
        // dd($id_member);
        $data['kategori'] = DB::table('kategoris')->get();
       
        $data['wish'] = DB::table('wishlists')
        ->join('bukus','wishlists.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();
        $data['cart'] = DB::table('keranjangtmps')
        ->join('bukus','keranjangtmps.id_buku','=','bukus.id_buku')->where('id_member',$id_member)
        ->get();
        return view ('frontend.page.wishlist',$data);
    
    }

    public function wish(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_buku' => 'required'
            
        ]);
    
        if ($validator->fails()){
            return redirect('wishlist')
            ->withErrors($validator)
            ->withInput();
        }else{
            $id_member = Auth::user()->id;
            // ambil harga barang dari id barang
            $barang = DB::table('bukus')->where('id_buku',$r->id_buku)->first();

            // cek id buku yang sama
            $cek = DB::table('wishlists')-> where('id_buku',$r->id_buku)
            ->where('id_member',$id_member)->first();
            // jika buku telah ada maka update qty
            if($cek==TRUE){
               $simpan= DB::table('wishlists')->where('id_wishlist',$cek->id_wishlist)
                ->update([
                    'id_buku' => $cek->id_buku, 
                ]); 
            }else{    
                $simpan= DB::table('wishlists')->insert([
                    'id_member'=> $id_member,
                    'id_buku'=> $r->id_buku,
                   
                ]);
            }
        }
    
        if($simpan == TRUE){
            return redirect ('wishlist')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('wishlist')-> with('error','Data Gagal Disimpan');
        }
    }
    public function hapus($id)
    {
        $hapus = DB::table('wishlists')->where('id_wishlist',$id)->delete();
        if ($hapus==TRUE){
            return redirect('wishlist')->with('success','Data Berhasil Dihapus');
        }else{
            return redirect('wishlist')->with('error','Data Gagal Dihapus');
        }
    }
}
