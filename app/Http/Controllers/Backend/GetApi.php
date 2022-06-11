<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;

class GetApi extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'key' => 'b7a1e2043766e20034d60e8b082c0361'
        ])->get('https://api.rajaongkir.com/starter/province');
        return $response['rajaongkir']['results'];
    }
}
