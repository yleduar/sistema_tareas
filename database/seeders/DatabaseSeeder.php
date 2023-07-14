<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(PerfilSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(EstadoSeeder::class);
    }
}
