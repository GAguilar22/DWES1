<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Utilizem aquesta funcio per a importar tots els Seeders alhora
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
            EsdevenimentSeeder::class,
        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
