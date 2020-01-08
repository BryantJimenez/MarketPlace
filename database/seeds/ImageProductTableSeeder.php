<?php

use Illuminate\Database\Seeder;

class ImageProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageProduct = [
    		['id' => 1, 'product_id' => 1, 'image' => 'bujia.jpg'],
    		['id' => 2, 'product_id' => 2, 'image' => 'condensador.jpg'],
    		['id' => 3, 'product_id' => 3, 'image' => 'culata.jpg'],
    		['id' => 4, 'product_id' => 4, 'image' => 'bloque.webp'],
    		['id' => 5, 'product_id' => 5, 'image' => 'carter.jpg'],
    		['id' => 6, 'product_id' => 6, 'image' => 'arbol-de-levas.jpg'],
    		['id' => 7, 'product_id' => 7, 'image' => 'valvulas.png'],
    		['id' => 8, 'product_id' => 8, 'image' => 'pistones.jpg'],
    		['id' => 9, 'product_id' => 9, 'image' => 'cilindros.jpg'],
    		['id' => 10, 'product_id' => 10, 'image' => 'ciguenal.jpg']
    	];
    	DB::table('image_product')->insert($imageProduct);
    }
}
