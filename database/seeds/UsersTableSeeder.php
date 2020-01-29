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
            'country_id' => 173,
            'district_id' => 110112,
            'genrer' => 'Masculino',
            'birthday' => '1995-06-20',
            'address' => 'Calle nueva, avenida olvidada',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('12345678'),
        	'state' => 1,
            'type' => 1
        ]);
    }
}
