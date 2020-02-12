<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Super',
            'lastname' => 'Admin',
            'phone' => '12345678',
        	'photo' => 'usuario.png',
        	'slug' => 'super-admin',
            'dni' => '0000000',
            'country_id' => 232,
            'genrer' => 'Femenino',
            'birthday' => '1999-08-26',
            'address' => 'Calle nueva, avenida olvidada',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('12345678'),
        	'state' => 1,
            'type' => 1
        ]);

        App\User::create([
        	'name' => 'Eduardo',
            'lastname' => 'Rosario',
        	'photo' => 'usuario.png',
        	'slug' => 'eduardo-rosario',
            'country_id' => 173,
            'genrer' => 'Masculino',
        	'email' => 'eduardo_carlo@hotmail.com',
        	'password' => '$2y$10$IPuWXpzNG6ha4ZdnZgYUd.miVxQQbJUCuJks/A/jDTXbxO8bI2cTC',
        	'state' => 1,
            'type' => 1
        ]);
    }
}
