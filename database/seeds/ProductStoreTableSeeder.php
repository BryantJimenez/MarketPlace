<?php

use Illuminate\Database\Seeder;

class ProductStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productStore = [
    		['id' => 1, 'product_id' => 1, 'store_id' => 1],
    		['id' => 2, 'product_id' => 2, 'store_id' => 1],
    		['id' => 3, 'product_id' => 3, 'store_id' => 2],
    		['id' => 4, 'product_id' => 4, 'store_id' => 2],
    		['id' => 5, 'product_id' => 5, 'store_id' => 2],
    		['id' => 6, 'product_id' => 6, 'store_id' => 2],
    		['id' => 7, 'product_id' => 7, 'store_id' => 2],
            ['id' => 8, 'product_id' => 8, 'store_id' => 1],
            ['id' => 9, 'product_id' => 9, 'store_id' => 1],
            ['id' => 10, 'product_id' => 10, 'store_id' => 1],
            ['id' => 11, 'product_id' => 11, 'store_id' => 1],
            ['id' => 12, 'product_id' => 12, 'store_id' => 3],
            ['id' => 13, 'product_id' => 13, 'store_id' => 3],
            ['id' => 14, 'product_id' => 14, 'store_id' => 3],
            ['id' => 15, 'product_id' => 15, 'store_id' => 3],
            // ['id' => 16, 'product_id' => 16, 'store_id' => 3],
            ['id' => 17, 'product_id' => 17, 'store_id' => 4],
            ['id' => 18, 'product_id' => 18, 'store_id' => 4],
            ['id' => 19, 'product_id' => 19, 'store_id' => 4],
            ['id' => 20, 'product_id' => 20, 'store_id' => 4],
            ['id' => 21, 'product_id' => 21, 'store_id' => 4],
            ['id' => 22, 'product_id' => 22, 'store_id' => 5],
            ['id' => 23, 'product_id' => 23, 'store_id' => 5],
            ['id' => 24, 'product_id' => 24, 'store_id' => 5],
            ['id' => 25, 'product_id' => 25, 'store_id' => 5],
            ['id' => 26, 'product_id' => 26, 'store_id' => 5]
    	];
    	DB::table('product_store')->insert($productStore);
    }
}
