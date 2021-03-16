<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MedicosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('medicos')->delete();

        \DB::table('medicos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'pessoa_id' => 1,
                'rg' => '11.111.111-1',
                'conselho' => 'Conselho teste',
                'num_conselho' => '7712',
                'rqe' => '11111',
            'telefone' => '(68) 3225-0907',
            'celular' => '(68) 99946-9195',
                'created_at' => '2021-01-11 00:14:28',
                'updated_at' => '2021-01-11 00:14:28',
            ),
        ));


    }
}
