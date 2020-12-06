<?php

namespace Database\Seeders;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TiposUsuariosSeeder::class,
            EspecialidadeMedicoSeeder::class,
            UsersSeeder::class,
            PessoaSeeder::class,
            MedicoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
