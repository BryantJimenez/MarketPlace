<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
    		['id' => 1, 'name' => 'Motores 2020', 'slug' => 'motores-2020', 'district_id' => 150122, 'address' => 'Calle 7, AV. Santa Miraflores', 'phone' => '8758573855', 'lat' => '-12.05533217', 'lng' => '-77.04288125', 'state' => 1],
    		['id' => 2, 'name' => 'El Taller de los Respuestos', 'slug' => 'el-taller-de-los-repuestos', 'district_id' => 150115, 'address' => 'AV. Principal cc Calle Intercomunal', 'phone' => '7467647455', 'lat' => '-12.0699999', 'lng' => '-77.02974916', 'state' => 1],
    		['id' => 3, 'name' => 'Mil Repuestos', 'slug' => 'mil-repuestos', 'district_id' => 150122, 'address' => 'Calle Libertador, Local n° 46', 'phone' => '7837855783', 'lat' => '-12.12341806', 'lng' => '-77.02952385', 'state' => 1]
    	];
    	DB::table('stores')->insert($stores);
    }
}
