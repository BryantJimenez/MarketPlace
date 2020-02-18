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
            ['id' => 1, 'name' => 'Bosch', 'slug' => 'bosch'],
            ['id' => 2, 'name' => 'Transpo Electronics', 'slug' => 'transpo-electronics'],
            ['id' => 3, 'name' => 'M&X Solenoid', 'slug' => 'mx-solenoid'],
            ['id' => 4, 'name' => 'Unifap', 'slug' => 'unifap'],
            ['id' => 5, 'name' => 'Vistony', 'slug' => 'vistony'],
            ['id' => 6, 'name' => 'Shell', 'slug' => 'shell'],
            ['id' => 7, 'name' => 'KYB', 'slug' => 'kyb'],
            ['id' => 8, 'name' => 'PHC Valeo', 'slug' => 'phc-valeo'],
            ['id' => 9, 'name' => 'Beste', 'slug' => 'beste'],
            ['id' => 10, 'name' => 'Hagen', 'slug' => 'hagen'],
            ['id' => 11, 'name' => 'OCI', 'slug' => 'oci'],
            ['id' => 12, 'name' => 'ALB & IMP', 'slug' => 'alb-imp'],
            ['id' => 13, 'name' => 'SKIND', 'slug' => 'skind'],
            ['id' => 14, 'name' => 'WAI', 'slug' => 'wai'],
            ['id' => 15, 'name' => 'FVA', 'slug' => 'fva'],
            ['id' => 16, 'name' => 'EMPI', 'slug' => 'empi']
        ];
        DB::table('brandsProducts')->insert($brandsProducts);
    }
}
