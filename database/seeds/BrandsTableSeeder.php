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
            ['id' => 1, 'name' => 'Toyota', 'slug' => 'toyota', 'image' => 'toyota.jpg', 'quality' => "5.0"],
            ['id' => 2, 'name' => 'KIA', 'slug' => 'kia', 'image' => 'kia.jpg', 'quality' => "5.0"],
            ['id' => 3, 'name' => 'Suzuki', 'slug' => 'suzuki', 'image' => 'suzuki.png', 'quality' => "5.0"],
            ['id' => 4, 'name' => 'Chevrolet', 'slug' => 'chevrolet', 'image' => 'chevrolet.jpg', 'quality' => "5.0"],
            ['id' => 5, 'name' => 'Hyundai', 'slug' => 'hyundai', 'image' => 'hyundai.png', 'quality' => "5.0"]
        ];
        DB::table('brands')->insert($brands);
    }
}
