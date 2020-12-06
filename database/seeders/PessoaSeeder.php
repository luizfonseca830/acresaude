<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pessoa::create([
            'user_id' => 1,
            'tipo_usuario_id' => 2,
            'nome' => 'medico',
            'sobrenome' => 'medico',
            'cpf' => '1111',
        ]);
    }
}
