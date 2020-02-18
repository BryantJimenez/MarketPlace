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
            ['id' => 1, 'product_id' => 1, 'image' => 'bujia.png'],
    		// ['id' => 2, 'product_id' => 1, 'image' => 'bujia-1.jpg'],
    		['id' => 3, 'product_id' => 2, 'image' => 'bujia.png'],
            // ['id' => 4, 'product_id' => 2, 'image' => 'bujia-1.jpg'],
    		['id' => 5, 'product_id' => 3, 'image' => 'relay-electronico.jpg'],
            ['id' => 6, 'product_id' => 3, 'image' => 'relay-electronico-1.jpg'],
            ['id' => 7, 'product_id' => 4, 'image' => 'arrancador.jpg'],
    		['id' => 8, 'product_id' => 4, 'image' => 'arrancador-1.webp'],
    		['id' => 9, 'product_id' => 5, 'image' => 'porta-carbones-de-arrancador.jpg'],
            ['id' => 10, 'product_id' => 5, 'image' => 'porta-carbones-de-arrancador-1.jpg'],
    		['id' => 11, 'product_id' => 6, 'image' => 'aceite-sintetico-10w-40-de-4-litros.jpg'],
            ['id' => 12, 'product_id' => 6, 'image' => 'aceite-sintetico-10w-40-de-4-litros-1.jpg'],
    		['id' => 13, 'product_id' => 7, 'image' => 'aceite-semi-sintetico-de-1-litro.jpg'],
            ['id' => 14, 'product_id' => 7, 'image' => 'aceite-semi-sintetico-de-1-litro-1.jpg'],
            ['id' => 15, 'product_id' => 8, 'image' => 'platino.png'],
            ['id' => 16, 'product_id' => 9, 'image' => 'condensador.png'],
            ['id' => 17, 'product_id' => 10, 'image' => 'filtro-de-gasolina.png'],
            ['id' => 18, 'product_id' => 11, 'image' => 'cables-de-bujia-4-cables.jpg'],
            ['id' => 19, 'product_id' => 12, 'image' => 'amortiguadores.jpg'],
            ['id' => 20, 'product_id' => 13, 'image' => 'embrague.jpg'],
            ['id' => 21, 'product_id' => 14, 'image' => 'pastillas-de-freno.jpg'],
            ['id' => 22, 'product_id' => 15, 'image' => 'pastillas-de-freno-1.jpg'],
            ['id' => 23, 'product_id' => 16, 'image' => 'bujia-2.jpg'],
            ['id' => 24, 'product_id' => 17, 'image' => 'limpia-carburador.jpg'],
            ['id' => 25, 'product_id' => 18, 'image' => 'claxon.jpg'],
            ['id' => 26, 'product_id' => 19, 'image' => 'alternador.jpg'],
            ['id' => 27, 'product_id' => 20, 'image' => 'arrancador-2.jpg'],
            ['id' => 28, 'product_id' => 21, 'image' => 'armadura-para-arrancadores.jpg'],
            ['id' => 29, 'product_id' => 22, 'image' => 'bujia.png'],
            ['id' => 30, 'product_id' => 23, 'image' => 'alternador-1.jpg'],
            ['id' => 31, 'product_id' => 24, 'image' => 'bobina.png'],
            ['id' => 32, 'product_id' => 25, 'image' => 'ponchos-de-trompeta.jpg'],
            ['id' => 33, 'product_id' => 26, 'image' => 'filtro-de-aire.jpg']
    	];
    	DB::table('image_product')->insert($imageProduct);
    }
}
