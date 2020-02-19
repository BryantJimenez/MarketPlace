<?php

use Illuminate\Database\Seeder;

class WorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talleres = [
        	[
        		'name'		  => 'Taller Matucana',
        		'slug' 		  => 'taller-matucana',
        		'district_id' => 10104,
        		'brand_id'    => null,
        		'address'     => 'La victoria, lima, perú',
        		'phone'       => '12345678',
        		'lat' 		  => -12.0431800,
        		'lng'		  => -77.0282400,
        		'owner'       => 'José Machado',
        		'video'       => '16-2 Final Mister Fix.mp4',
        		'type'        => 1,
        		'state'       => 1

        	],
        	[
        		'name'		  => 'Taller San vicente',
        		'slug' 		  => 'taller-san-vicente',
        		'district_id' => 10104,
        		'brand_id'    => null,
        		'address'     => 'La victoria, lima, perú',
        		'phone'       => '12345678',
        		'lat' 		  => -12.0431800,
        		'lng'		  => -77.0282400,
        		'owner'       => 'Roberto Smeet',
        		'video'       => '16-2 Final Mister Fix.mp4',
        		'type'        => 1,
        		'state'       => 1

        	],
        	[
        		'name'		  => 'Taller Toyota',
        		'slug' 		  => 'taller-toyota',
        		'district_id' => 10104,
        		'brand_id'    => 1,
        		'address'     => 'La victoria, lima, perú',
        		'phone'       => '12345678',
        		'lat' 		  => -12.0431800,
        		'lng'		  => -77.0282400,
        		'owner'       => 'María Flores',
        		'video'       => '16-2 Final Mister Fix.mp4',
        		'type'        => 2,
        		'state'       => 1

        	]
        ];

        DB::table('workshops')->insert($talleres);
    }
}
