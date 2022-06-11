<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Kota;

class KotaSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/city');
        $kotas=  $response['rajaongkir']['results'];

        foreach ($kotas as $kota) {
            $data_kota[]=[
                'id' => $kota['city_id'],
                'province_id' => $kota['province_id'],
                'type' => $kota['type'],
                'city_name' => $kota['city_name'],
                'postal_code' => $kota['postal_code']
            ];
        }

        Kota::insert($data_kota);
    }
}
