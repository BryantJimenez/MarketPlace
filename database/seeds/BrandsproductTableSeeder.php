<?php

use Illuminate\Database\Seeder;

class BrandsproductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsProduct = [
    		['id' => 1, 'product_id' => 1, 'brand_id' => 1],
    		['id' => 2, 'product_id' => 2, 'brand_id' => 1],
    		['id' => 3, 'product_id' => 3, 'brand_id' => 2],
    		['id' => 4, 'product_id' => 4, 'brand_id' => 2],
    		['id' => 5, 'product_id' => 5, 'brand_id' => 2],
    		['id' => 6, 'product_id' => 6, 'brand_id' => 2],
    		['id' => 7, 'product_id' => 7, 'brand_id' => 2],
            ['id' => 8, 'product_id' => 8, 'brand_id' => 1],
            ['id' => 9, 'product_id' => 9, 'brand_id' => 1],
            ['id' => 10, 'product_id' => 10, 'brand_id' => 1],
            ['id' => 11, 'product_id' => 11, 'brand_id' => 1],
            ['id' => 12, 'product_id' => 12, 'brand_id' => 3],
            ['id' => 13, 'product_id' => 13, 'brand_id' => 3],
            ['id' => 14, 'product_id' => 14, 'brand_id' => 3],
            ['id' => 15, 'product_id' => 15, 'brand_id' => 3],
            ['id' => 16, 'product_id' => 16, 'brand_id' => 3],
            ['id' => 17, 'product_id' => 17, 'brand_id' => 4],
            ['id' => 18, 'product_id' => 18, 'brand_id' => 4],
            ['id' => 19, 'product_id' => 19, 'brand_id' => 4],
            ['id' => 20, 'product_id' => 20, 'brand_id' => 4],
            ['id' => 21, 'product_id' => 21, 'brand_id' => 4],
            ['id' => 22, 'product_id' => 22, 'brand_id' => 5],
            ['id' => 23, 'product_id' => 23, 'brand_id' => 5],
            ['id' => 24, 'product_id' => 24, 'brand_id' => 5],
            ['id' => 25, 'product_id' => 25, 'brand_id' => 5],
            ['id' => 26, 'product_id' => 26, 'brand_id' => 5]
    	];
    	DB::table('brand_product')->insert($brandsProduct);
    }
}
