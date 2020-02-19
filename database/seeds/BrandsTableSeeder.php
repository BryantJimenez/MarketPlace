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
            ['id' => 5, 'name' => 'Hyundai', 'slug' => 'hyundai', 'image' => 'hyundai.png'],
            ['id' => 6, 'name' => 'Volkswagen', 'slug' => 'volkswagen', 'image' => 'volkswagen.png'],
            ['id' => 7, 'name' => 'Nissan', 'slug' => 'nissan', 'image' => 'nissan.jpg'],
            ['id' => 8, 'name' => 'Honda', 'slug' => 'honda', 'image' => 'honda.png'],
            ['id' => 9, 'name' => 'Mitsubishi', 'slug' => 'mitsubishi', 'image' => 'mitsubishi.jpg']
        ];
        DB::table('brands')->insert($brands);
    }
}
