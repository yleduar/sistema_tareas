<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estado::insert([
          ['id' => 1,  'descripcion' => 'En proceso'],
          ['id' => 2,  'descripcion' => 'Completada'],
        ]);
    }
}
