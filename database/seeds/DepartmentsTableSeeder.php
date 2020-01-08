<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$departments = [
            array('id' => '1','name' => 'Amazonas'),
            array('id' => '2','name' => 'Áncash'),
            array('id' => '3','name' => 'Apurímac'),
            array('id' => '4','name' => 'Arequipa'),
            array('id' => '5','name' => 'Ayacucho'),
            array('id' => '6','name' => 'Cajamarca'),
            array('id' => '7','name' => 'Callao'),
            array('id' => '8','name' => 'Cusco'),
            array('id' => '9','name' => 'Huancavelica'),
            array('id' => '10','name' => 'Huánuco'),
            array('id' => '11','name' => 'Ica'),
            array('id' => '12','name' => 'Junín'),
            array('id' => '13','name' => 'La Libertad'),
            array('id' => '14','name' => 'Lambayeque'),
            array('id' => '15','name' => 'Lima'),
            array('id' => '16','name' => 'Loreto'),
            array('id' => '17','name' => 'Madre de Dios'),
            array('id' => '18','name' => 'Moquegua'),
            array('id' => '19','name' => 'Pasco'),
            array('id' => '20','name' => 'Piura'),
            array('id' => '21','name' => 'Puno'),
            array('id' => '22','name' => 'San Martín'),
            array('id' => '23','name' => 'Tacna'),
            array('id' => '24','name' => 'Tumbes'),
            array('id' => '25','name' => 'Ucayali')
        ];
        DB::table('departments')->insert($departments);
    }
}
