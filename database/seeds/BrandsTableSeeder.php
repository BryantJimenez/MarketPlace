<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
    		['id' => 1, 'name' => 'Toyota', 'slug' => 'toyota', 'image' => 'toyota.jpg'],
    		['id' => 2, 'name' => 'KIA', 'slug' => 'kia', 'image' => 'kia.jpg'],
    		['id' => 3, 'name' => 'Suzuki', 'slug' => 'suzuki', 'image' => 'suzuki.png'],
    		['id' => 4, 'name' => 'Chevrolet', 'slug' => 'chevrolet', 'image' => 'chevrolet.jpg'],
    		['id' => 5, 'name' => 'Hyundai', 'slug' => 'hyundai', 'image' => 'hyundai.png']
    	];
    	DB::table('brands')->insert($brands);
    }
}
