<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {    
        Categoria::create(['nom' => 'Esports']);
        Categoria::create(['nom' => 'Ciència']);
        Categoria::create(['nom' => 'Espectacles']);
        Categoria::create(['nom' => 'Màgia']);
        Categoria::create(['nom' => 'Música']);
        Categoria::create(['nom' => 'Art']);
    }
}
