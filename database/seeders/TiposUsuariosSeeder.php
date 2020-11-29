<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Seeder;

class TiposUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TipoUsuario::create([
            'nome' => 'Administrador'
        ]);

        TipoUsuario::create([
            'nome' => 'Doutor'
        ]);

        TipoUsuario::create([
            'nome' => 'Paciente'
        ]);
    }
}
