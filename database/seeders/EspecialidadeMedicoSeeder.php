<?php

namespace Database\Seeders;

use App\Models\EspecilidadeMedico;
use Illuminate\Database\Seeder;

class EspecialidadeMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EspecilidadeMedico::create([
            'nome' => 'Teste',
        ]);
    }
}
