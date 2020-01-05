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
        	'name' => 'Admin',
        	'photo' => 'usuario.png',
        	'slug' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('12345678'),
        	'state' => 1,
            'type' => 1
        ]);
    }
}