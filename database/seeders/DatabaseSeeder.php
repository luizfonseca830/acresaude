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
        $this->call(TiposUsuariosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PessoasTableSeeder::class);

        $this->call(EspecialidadesTableSeeder::class);
        $this->call(MedicosTableSeeder::class);
        $this->call(MedicoEspecialidadeTableSeeder::class);
    }
}
