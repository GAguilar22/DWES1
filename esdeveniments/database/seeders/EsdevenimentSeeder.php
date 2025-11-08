<?php

namespace Database\Seeders;

use App\Models\Esdeveniment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EsdevenimentSeeder extends Seeder
{
    public function run(): void
    {
         Esdeveniment::create([
            'nom' => 'Mitja Marató de Barcelona', 
            'descripcio' => 'Cursa popular a Barcelona', 
            'data' => '2025-06-15', 
            'hora' => '09:00:00', 
            'num_max_assistents' => 500, 
            'edat_minima' => 18, 
            'imatge' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5os4P71jAGPyD5YUBlTjvfD_wlUbh7AogYw&s', 
            'categoria_id' => 1
        ]);

        Esdeveniment::create([
            'nom' => 'Exposició Dalí', 
            'descripcio' => 'Descobreix els millors quadres de Dalí', 
            'data' => '2025-07-10', 
            'hora' => '10:00:00', 
            'num_max_assistents' => 50, 
            'edat_minima' => 12, 
            'imatge' => 'https://cd1.taquilla.com/data/images/t/a3/dali-cibernetico-en-ideal-barcelona__330x275.webp', 
            'categoria_id' => 6
        ]);
    }
}
