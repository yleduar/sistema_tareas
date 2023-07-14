<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perfil::insert([
          ['id' => 1,  'descripcion' => 'Administrador'],
          ['id' => 2,  'descripcion' => 'Usuario'],
        ]);
    }
}
