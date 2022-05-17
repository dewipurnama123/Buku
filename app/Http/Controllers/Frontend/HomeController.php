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
        $data['buku'] = DB::table('bukus')
        ->join('kategoris','bukus.id_kategori','=','kategoris.id_kategori')
        ->get();
        return view ('frontend.page.home',$data);
        
    }
}
