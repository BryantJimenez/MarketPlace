<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
    		['id' => 1, 'name' => 'Banco de Crédito', 'slug' => 'banco-de-credito'],
    		['id' => 2, 'name' => 'Banco Continental', 'slug' => 'banco-continental'],
    		['id' => 3, 'name' => 'Banco Interbank', 'slug' => 'banco-interbank'],
    		['id' => 4, 'name' => 'Banco Scotiabank', 'slug' => 'banco-scotiabank']
    	];
    	DB::table('banks')->insert($banks);
    }
}
