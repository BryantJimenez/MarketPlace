<?php

use Illuminate\Database\Seeder;

class BrandsproductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsProducts = [
            ['id' => 1, 'name' => 'Bosch', 'slug' => 'bosch', 'quality' => "5.0"],
            ['id' => 2, 'name' => 'Transpo Electronics', 'slug' => 'transpo-electronics', 'quality' => "5.0"],
            ['id' => 3, 'name' => 'M&X Solenoid', 'slug' => 'mx-solenoid', 'quality' => "5.0"],
            ['id' => 4, 'name' => 'Unifap', 'slug' => 'unifap', 'quality' => "5.0"],
            ['id' => 5, 'name' => 'Vistony', 'slug' => 'vistony', 'quality' => "5.0"],
            ['id' => 6, 'name' => 'Shell', 'slug' => 'shell', 'quality' => "5.0"],
            ['id' => 7, 'name' => 'KYB', 'slug' => 'kyb', 'quality' => "5.0"],
            ['id' => 8, 'name' => 'PHC Valeo', 'slug' => 'phc-valeo', 'quality' => "5.0"],
            ['id' => 9, 'name' => 'Beste', 'slug' => 'beste', 'quality' => "5.0"],
            ['id' => 10, 'name' => 'Hagen', 'slug' => 'hagen', 'quality' => "5.0"],
            ['id' => 11, 'name' => 'OCI', 'slug' => 'oci', 'quality' => "5.0"],
            ['id' => 12, 'name' => 'ALB & IMP', 'slug' => 'alb-imp', 'quality' => "5.0"],
            ['id' => 13, 'name' => 'SKIND', 'slug' => 'skind', 'quality' => "5.0"],
            ['id' => 14, 'name' => 'WAI', 'slug' => 'wai', 'quality' => "5.0"],
            ['id' => 15, 'name' => 'FVA', 'slug' => 'fva', 'quality' => "5.0"],
            ['id' => 16, 'name' => 'EMPI', 'slug' => 'empi', 'quality' => "5.0"],
            ['id' => 17, 'name' => 'Hyundai', 'slug' => 'hyundai', 'quality' => "5.0"]
        ];
        DB::table('brandsProducts')->insert($brandsProducts);
    }
}
