<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
          ['id' => 1,  'name' => 'Armando Casas', 'email' => 'armando@mañosos.com', 'password'=> '$2y$10$BXJTJM4zP3p5hQhzqi1aiudUe9gERXsBjfKaACXxfYfjFIu5yvvvW', 'perfil_id' => 1 ],
          ['id' => 2,  'name' => 'Carlos Pinto', 'email' => 'carlos@mañosos.com', 'password'=> '$2y$10$BXJTJM4zP3p5hQhzqi1aiudUe9gERXsBjfKaACXxfYfjFIu5yvvvW', 'perfil_id' => 2 ],
        ]);
    }
}
