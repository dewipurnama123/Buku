<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $data['kategori'] = DB::table('kategoris')->get();
        $data['buku'] = DB::table('bukus')
        ->paginate(12);
        return view ('frontend.page.home',$data);
        
    }
    public function kategori($id){
        $data['kate'] = DB::table('kategoris')->where('kategoris.id_kategori',$id)->first();
        $data['kategori'] = DB::table('kategoris')->get();
        $data['buku'] = DB::table('bukus')
        ->join('kategoris','bukus.id_kategori','=','kategoris.id_kategori')
        ->where('kategoris.id_kategori',$id)
        ->get();
        return view ('frontend.page.kategori',$data);
        
    }

    
}