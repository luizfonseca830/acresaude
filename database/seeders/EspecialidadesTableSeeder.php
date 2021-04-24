<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('especialidades')->delete();

        \DB::table('especialidades')->insert(array (
            0 =>
            array (
                'id' => 1,
                'especialidade' => 'Clinico Geral',
                'descricao' => 'Teleconsulta',
                'created_at' => '2021-01-10 21:53:07',
                'updated_at' => '2021-01-10 21:53:07',
            ),
            1 =>
            array (
                'id' => 2,
                'especialidade' => 'Cardiologia',
                'descricao' => 'Teleconsulta',
                'created_at' => '2021-01-10 21:53:07',
                'updated_at' => '2021-01-10 21:53:07',
            ),
            2 =>
            array (
                'id' => 3,
                'especialidade' => 'Dermatologia',
                'descricao' => 'Teleconsulta',
                'created_at' => '2021-01-10 21:53:07',
                'updated_at' => '2021-01-10 21:53:07',
            ),
            3 =>
            array (
                'id' => 4,
                'especialidade' => 'Psiquiatria',
                'descricao' => 'Teleconsulta',
                'created_at' => '2021-01-10 21:53:07',
                'updated_at' => '2021-01-10 21:53:07',
            ),
        ));


    }
}
