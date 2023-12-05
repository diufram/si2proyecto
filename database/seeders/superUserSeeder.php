<?php

namespace Database\Seeders;

use App\Models\categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class superUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'superUsuario']);

        User::create([
            'nombre' => 'SuperUsuario',
            'fechaNacimiento' => null,
            'sexo' => null,
            'telefono' => null,
            'email' => 'SuperUsuario@gmail.com',
            'password' => bcrypt('password'),
            'direccion' => null,
            'nit' => null,
            'tipo' => null,
            'edad' => null,
        ])->assignRole('superUsuario');





    }
}
