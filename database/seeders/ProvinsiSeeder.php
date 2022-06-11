<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'b7a1e2043766e20034d60e8b082c0361'
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinsis=  $response['rajaongkir']['results'];

        foreach ($provinsis as $provinsi) {
            $data_provinsi[]=[
                'id' => $provinsi['province_id'],
                'province' => $provinsi['province']
            ];
        }

        Provinsi::insert($data_provinsi);
    }
}
