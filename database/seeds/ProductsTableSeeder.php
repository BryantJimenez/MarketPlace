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
        $products = [
            ['id' => 1, 'name' => 'Bujía', 'slug' => 'bujia', 'price' => 8.00, 'qty' => 10, 'description' => 'Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 7],
            ['id' => 2, 'name' => 'Juego de 4 bujías', 'slug' => 'juego-de-4-bujias', 'price' => 27.00, 'qty' => 10, 'description' => 'Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 7],
            ['id' => 3, 'name' => 'Relay electrónico', 'slug' => 'relay-electronico', 'price' => 37.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Puede ser utilizado por todas las marcas.', 'brand_id' => 2, 'subcategory_id' => 24],
            ['id' => 4, 'name' => 'Arrancador', 'slug' => 'arrancador', 'price' => 68.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Puede ser utilizado por todas las marcas.', 'brand_id' => 3, 'subcategory_id' => 25],
            ['id' => 5, 'name' => 'Porta carbones de arrancador', 'slug' => 'porta-carbones-de-arrancador', 'price' => 53.00, 'qty' => 10, 'description' => 'País de procedencia: Brasil. Puede ser utilizado por todas las marcas.', 'brand_id' => 4, 'subcategory_id' => 25],
            ['id' => 6, 'name' => 'Aceite Sintético 10W-40 de 4 litros', 'slug' => 'aceite-sintetico-10w-40-de-4-litros', 'price' => 136.00, 'qty' => 10, 'description' => 'País de procedencia: Perú. Puede ser utilizado por todas las marcas.', 'brand_id' => 5, 'subcategory_id' => 6],
            ['id' => 7, 'name' => 'Aceite Semi sintético de 1 litro', 'slug' => 'aceite-semi-sintetico-de-1-litro', 'price' => 37.00, 'qty' => 10, 'description' => 'País de procedencia: Países Bajos. Puede ser utilizado por todas las marcas.', 'brand_id' => 6, 'subcategory_id' => 6],
            ['id' => 8, 'name' => 'Platino', 'slug' => 'platino', 'price' => 16.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 25],
            ['id' => 9, 'name' => 'Condensador', 'slug' => 'condensador', 'price' => 12.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 8],
            ['id' => 10, 'name' => 'Filtro de gasolina', 'slug' => 'filtro-de-gasolina', 'price' => 8.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 17],
            ['id' => 11, 'name' => 'Cables de Bujía (4 cables)', 'slug' => 'cables-de-bujia-4-cables', 'price' => 29.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Para autos volkswagen.', 'brand_id' => 1, 'subcategory_id' => 7],
            ['id' => 12, 'name' => 'Amortiguadores', 'slug' => 'amortiguadores', 'price' => 365.00, 'qty' => 10, 'description' => 'País de procedencia: Rusia. Para autos Nissan Sentra.', 'brand_id' => 7, 'subcategory_id' => 26],
            ['id' => 13, 'name' => 'Embrague', 'slug' => 'embrague', 'price' => 396.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Para autos Hyundai.', 'brand_id' => 8, 'subcategory_id' => 26],
            ['id' => 14, 'name' => 'Pastillas de freno', 'slug' => 'pastillas-de-freno', 'price' => 79.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Para autos Nissan Sentra.', 'brand_id' => 9, 'subcategory_id' => 27],
            ['id' => 15, 'name' => 'Pastillas de freno', 'slug' => 'pastillas-de-freno-1', 'price' => 99.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Para autos KIA.', 'brand_id' => 10, 'subcategory_id' => 27],
            ['id' => 16, 'name' => 'Bujía (Juego de 4)', 'slug' => 'bujia-juego-de-4', 'price' => 58.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Para autos Hyundai.', 'brand_id' => 17, 'subcategory_id' => 7],
            ['id' => 17, 'name' => 'Limpia Carburador', 'slug' => 'limpia-carburador', 'price' => 11.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Puede ser utilizado por todas las marcas.', 'brand_id' => 10, 'subcategory_id' => 28],
            ['id' => 18, 'name' => 'Claxon', 'slug' => 'claxon', 'price' => 63.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Puede ser utilizado por todas las marcas.', 'brand_id' => 1, 'subcategory_id' => 28],
            ['id' => 19, 'name' => 'Alternador', 'slug' => 'alternador', 'price' => 230.00, 'qty' => 10, 'description' => 'País de procedencia: Alemania. Para autos Nissan y Mitsubishi.', 'brand_id' => 12, 'subcategory_id' => 29],
            ['id' => 20, 'name' => 'Arrancador', 'slug' => 'arrancador-1', 'price' => 313.00, 'qty' => 10, 'description' => 'País de procedencia: China. Para autos Honda y Nissan.', 'brand_id' => 13, 'subcategory_id' => 14],
            ['id' => 21, 'name' => 'Armadura para arrancadores', 'slug' => 'armadura-para-arrancadores', 'price' => 68.00, 'qty' => 10, 'description' => 'País de procedencia: Corea. Para autos Mitsubishi.', 'brand_id' => 14, 'subcategory_id' => 25],
            ['id' => 22, 'name' => 'Bujía (Juego de 4)', 'slug' => 'bujia-juego-de-4-1', 'price' => 21.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Para autos Volkswagen.', 'brand_id' => 1, 'subcategory_id' => 7],
            ['id' => 23, 'name' => 'Alternador ', 'slug' => 'alternador-1', 'price' => 313.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Para autos Volkswagen.', 'brand_id' => 15, 'subcategory_id' => 29],
            ['id' => 24, 'name' => 'Bobina', 'slug' => 'bobina', 'price' => 89.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Para autos Volkswagen.', 'brand_id' => 1, 'subcategory_id' => 31],
            ['id' => 25, 'name' => 'Ponchos de trompeta', 'slug' => 'ponchos-de-trompeta', 'price' => 47.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Para autos Volkswagen.', 'brand_id' => 16, 'subcategory_id' => 28],
            ['id' => 26, 'name' => 'Filtro de aire', 'slug' => 'filtro-de-aire', 'price' => 47.00, 'qty' => 10, 'description' => 'País de procedencia: EEUU. Para autos Volkswagen.', 'brand_id' => 16, 'subcategory_id' => 30]
        ];
        DB::table('products')->insert($products);
    }
}
