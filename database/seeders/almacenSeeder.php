<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Almacen;


class almacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Almacen::create([
            'nombreAlmacen' => 'planta baja',
            'ubicacion' => 'santa cruz',
        ]);
        Almacen::create([
            'nombreAlmacen' => 'planta alta',
            'ubicacion' => 'la paz',
        ]);
    
    }
}
