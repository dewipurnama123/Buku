<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $grafik = DB::table('keranjangs')->join('bukus','bukus.id_buku','keranjangs.id_buku')->select(DB::raw("SUM(keranjangs.qty) as total"),'bukus.judul')->groupBy('keranjangs.id_buku')->orderBy('total','DESC')->get();

        $total = [];
        $judul = [];

        foreach($grafik as $i => $a){
            $total[] = (int)$a->total;

            $judul[] = $a->judul;
        }

        $data['total'] = $total;
        $data['judul'] = $judul;
        return view('backend.page.home',$data);
    }
}
