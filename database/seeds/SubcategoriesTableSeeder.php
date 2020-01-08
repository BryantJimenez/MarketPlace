<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$subcategories = [
    		['id' => 1, 'name' => 'Neumáticos para automoviles', 'slug' => 'neumaticos-para-automoviles', 'category_id' => 1],
    		['id' => 2, 'name' => 'Neumáticos para camiones', 'slug' => 'neumaticos-para-camiones', 'category_id' => 1],
    		['id' => 3, 'name' => 'Aceites minerales', 'slug' => 'aceites-minerales', 'category_id' => 2],
    		['id' => 4, 'name' => 'Aceites vegetales y animales', 'slug' => 'aceites-vegetales-y-animales', 'category_id' => 2],
    		['id' => 5, 'name' => 'Aceites compuestos', 'slug' => 'aceites-compuestos', 'category_id' => 2],
    		['id' => 6, 'name' => 'Aceites sintéticos', 'slug' => 'aceites-sinteticos', 'category_id' => 2],
    		['id' => 7, 'name' => 'Bujías', 'slug' => 'bujias', 'category_id' => 3],
    		['id' => 8, 'name' => 'Condensadores', 'slug' => 'condensadores', 'category_id' => 3],
    		['id' => 9, 'name' => 'Culatas', 'slug' => 'culatas', 'category_id' => 3],
    		['id' => 10, 'name' => 'Bloques', 'slug' => 'bloques', 'category_id' => 3],
    		['id' => 11, 'name' => 'Cárteres', 'slug' => 'carteres', 'category_id' => 3],
    		['id' => 12, 'name' => 'Árboles de levas', 'slug' => 'arboles-de-levas', 'category_id' => 3],
    		['id' => 13, 'name' => 'Válvulas', 'slug' => 'valvulas', 'category_id' => 3],
    		['id' => 14, 'name' => 'Pistones', 'slug' => 'pistones', 'category_id' => 3],
    		['id' => 15, 'name' => 'Cilindros', 'slug' => 'cilindros', 'category_id' => 3],
    		['id' => 16, 'name' => 'Cigüeñales', 'slug' => 'ciguenales', 'category_id' => 3],
    		['id' => 17, 'name' => 'Filtros de aceite mecánico', 'slug' => 'filtros-de-aceite-mecanico', 'category_id' => 4],
    		['id' => 18, 'name' => 'Filtros de aceite magnético', 'slug' => 'filtros-de-aceite-magnetico', 'category_id' => 4],
    		['id' => 19, 'name' => 'Filtros de aceite de alta eficiencia', 'slug' => 'filtros-de-aceite-de-alta-eficiencia', 'category_id' => 4],
    		['id' => 20, 'name' => 'Filtros de aceite por sedimentación', 'slug' => 'filtros-de-aceite-por-sedimentacion', 'category_id' => 4],
    		['id' => 21, 'name' => 'Filtros de aceite con cámara térmica', 'slug' => 'filtros-de-aceite-con-camara-tecnica', 'category_id' => 4],
    		['id' => 22, 'name' => 'Filtros de aceite centrífugo', 'slug' => 'filtros-de-aceite-centrifugo', 'category_id' => 4],
    		['id' => 23, 'name' => 'Cajas de velocidades', 'slug' => 'cajas-de-velocidades', 'category_id' => 5]
    	];
    	DB::table('subcategories')->insert($subcategories);
    }
}
