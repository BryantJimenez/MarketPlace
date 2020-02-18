<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
    		['id' => 1, 'name' => 'Repuestos Piura', 'slug' => 'repuestos-piura', 'district_id' => 150104, 'address' => 'Repuestera, Jirón Rosendo Vidaure, Barranco, Lima, 15063, Perú', 'phone' => '997892696', 'lat' => '-12.137861790202003', 'lng' => '-77.01826930046083', 'state' => 1, 'owner' => 'José Peña'],
    		['id' => 2, 'name' => 'Repuestos Volcán', 'slug' => 'repuestos-volcan', 'district_id' => 150108, 'address' => 'Avenida Caminos del Inca, Sarita Colonia, Chorrillos, Lima, 15067, Perú', 'phone' => '993382727', 'lat' => '-12.1931178', 'lng' => '-77.004091', 'state' => 1, 'owner' => 'Alberto Rojas'],
            ['id' => 3, 'name' => 'Repuestos Jofran Clauste', 'slug' => 'repuestos-jofran-clauste', 'district_id' => 150115, 'address' => 'Prolongación Parinacochas, Balconcillo, La Victoria, Lima, 15034, Perú', 'phone' => '946133095', 'lat' => '-12.0753262', 'lng' => '-77.0185386', 'state' => 1, 'owner' => 'Héctor Samames'],
            ['id' => 4, 'name' => 'Repuestos, Autoservicios José', 'slug' => 'repuestos-autoservicios-jose', 'district_id' => 150141, 'address' => 'Velarde, prolongacion carmen mz b6 lt9, Surquillo, Lima, LIMA 34, Perú', 'phone' => '998900018', 'lat' => '-12.1139441', 'lng' => '-77.0191106', 'state' => 1, 'owner' => 'José Marca'],
            ['id' => 5, 'name' => 'Repuestos Rojas', 'slug' => 'repuestos-rojas', 'district_id' => 150115, 'address' => 'Jirón Lucanas, Balconcillo, La Victoria, Lima, 15011, Perú', 'phone' => '994224661', 'lat' => '-12.0895568', 'lng' => '-77.039707', 'state' => 1, 'owner' => 'Rosas Vergaray']
    	];
    	DB::table('stores')->insert($stores);
    }
}
