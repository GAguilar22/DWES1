<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@exemple.com', 
            'password' => bcrypt('admin123'), 
            'data_naixement' => '1996-09-09', 
            'rol' => 'admin'
        ]);

        User::create([
            'name' => 'Usuari', 
            'email' => 'user@exemple.com', 
            'password' => bcrypt('user123'), 
            'data_naixement' => '2000-05-15', 
            'rol' => 'user'
        ]);
    }
}
