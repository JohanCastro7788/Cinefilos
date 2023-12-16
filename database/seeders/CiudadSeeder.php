<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ciudad::create([
            'cod_departamento' => 1,
            'nombre_ciu' => 'Calí'
        ]);

        Ciudad::create([
            'cod_departamento' => 1,
            'nombre_ciu' => 'Jamundí'
        ]);

        Ciudad::create([
            'cod_departamento' => 1,
            'nombre_ciu' => 'Cartago'
        ]);


        Ciudad::create([
            'cod_departamento' => 2,
            'nombre_ciu' => 'Medellin'
        ]);

        Ciudad::create([
            'cod_departamento' => 2,
            'nombre_ciu' => 'Abriaqui'
        ]);

        Ciudad::create([
            'cod_departamento' => 2,
            'nombre_ciu' => 'Anza'
        ]);

        Ciudad::create([
            'cod_departamento' => 3,
            'nombre_ciu' => 'Morales'
        ]);

        Ciudad::create([
            'cod_departamento' => 3,
            'nombre_ciu' => 'Popayán'
        ]);

        Ciudad::create([
            'cod_departamento' => 3,
            'nombre_ciu' => 'Puerto tejada'
        ]);
    }
}
