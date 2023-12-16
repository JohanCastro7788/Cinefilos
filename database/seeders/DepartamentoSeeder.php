<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::create([
            'nombre_departamento' => 'Valle del Cauca',
        ]);
        Departamento::create([
            'nombre_departamento' => 'Antioquia',
        ]);
        Departamento::create([
            'nombre_departamento' => 'Cauca',
        ]);
    }
}
