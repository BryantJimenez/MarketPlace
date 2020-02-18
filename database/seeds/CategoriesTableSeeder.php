<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		['id' => 1, 'name' => 'Neumáticos', 'slug' => 'neumaticos', 'image' => 'neumaticos.jpg'],
    		['id' => 2, 'name' => 'Lubricantes', 'slug' => 'lubricantes', 'image' => 'lubricantes.jpg'],
    		['id' => 3, 'name' => 'Partes de Motor', 'slug' => 'partes-de-motor', 'image' => 'partes-de-motor.jpg'],
    		['id' => 4, 'name' => 'Filtros', 'slug' => 'filtros', 'image' => 'filtros.jpg'],
    		['id' => 5, 'name' => 'Sistemas de Transmisión', 'slug' => 'sistemas-de-transmision', 'image' => 'sistemas-de-transmision.jpg'],
            ['id' => 6, 'name' => 'Encendido', 'slug' => 'encendido', 'image' => 'encendido.jpg'],
            ['id' => 7, 'name' => 'Instalaciones Eléctricas', 'slug' => 'instalaciones-electricas', 'image' => 'instalaciones-electricas.jpg'],
            ['id' => 8, 'name' => 'Suspensión y Dirección', 'slug' => 'suspension-y-direccion', 'image' => 'suspension-y-direccion.png'],
            ['id' => 9, 'name' => 'Frenos', 'slug' => 'frenos', 'image' => 'frenos.jpg'],
            ['id' => 10, 'name' => 'Accesorios para Vehículos', 'slug' => 'accesorios-para-vehiculos', 'image' => 'accesorios-para-vehiculo.png']
    	];
    	DB::table('categories')->insert($categories);
    }
}
