<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pessoas')->delete();

        \DB::table('pessoas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 1,
                'tipo_usuario_id' => 2,
                'nome' => 'Enoque Pereira',
                'sobrenome' => 'De Araujo',
                'cpf' => '952.855.311-79',
                'cnpj' => NULL,
                'data_nascimento' => '2000-06-06',
                'created_at' => '2021-01-10 21:11:21',
                'updated_at' => '2021-01-10 21:11:21',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 2,
                'tipo_usuario_id' => 1,
                'nome' => 'Administrador',
                'sobrenome' => 'ADM',
                'cpf' => '341.260.443-70',
                'cnpj' => NULL,
                'data_nascimento' => '1971-08-23',
                'created_at' => '2021-01-10 21:12:51',
                'updated_at' => '2021-01-10 21:12:51',
            ),
            2 =>
                array (
                    'id' => 3,
                    'user_id' => 3,
                    'tipo_usuario_id' => 3,
                    'nome' => 'Usuario',
                    'sobrenome' => 'User',
                    'cpf' => '902.885.212-34',
                    'cnpj' => NULL,
                    'data_nascimento' => '1971-08-23',
                    'created_at' => '2021-01-10 21:12:51',
                    'updated_at' => '2021-01-10 21:12:51',
                ),

            3 =>
                array (
                    'id' => 4,
                    'user_id' => 4,
                    'tipo_usuario_id' => 2,
                    'nome' => 'Rayssa',
                    'sobrenome' => 'Santos',
                    'cpf' => '146.988.685-56',
                    'cnpj' => NULL,
                    'data_nascimento' => '1971-08-23',
                    'created_at' => '2021-01-10 21:12:51',
                    'updated_at' => '2021-01-10 21:12:51',
                ),
        ));


    }
}
