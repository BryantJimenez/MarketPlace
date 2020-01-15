<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$description="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";

        $products = [
    		['id' => 1, 'name' => 'Bujía', 'slug' => 'bujia', 'price' => 20.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 7],
    		['id' => 2, 'name' => 'Condensador', 'slug' => 'condensador', 'price' => 10.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 8],
    		['id' => 3, 'name' => 'Culata', 'slug' => 'culata', 'price' => 1200.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 9],
    		['id' => 4, 'name' => 'Bloque', 'slug' => 'bloque', 'price' => 2800.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 10],
    		['id' => 5, 'name' => 'Cárter', 'slug' => 'carter', 'price' => 15.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 11],
    		['id' => 6, 'name' => 'Árbol de levas', 'slug' => 'arbol-de-levas', 'price' => 180.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 12],
    		['id' => 7, 'name' => 'Válvulas', 'slug' => 'valvulas', 'price' => 95.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 13],
    		['id' => 8, 'name' => 'Pistones', 'slug' => 'pistones', 'price' => 220.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 14],
    		['id' => 9, 'name' => 'Cilindros', 'slug' => 'cilindros', 'price' => 220.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 15],
    		['id' => 10, 'name' => 'Cigüeñal', 'slug' => 'ciguenal', 'price' => 400.00, 'qty' => 10, 'description' => $description, 'brand_id' => rand(1, 5), 'subcategory_id' => 16]
    	];
    	DB::table('products')->insert($products);
    }
}
