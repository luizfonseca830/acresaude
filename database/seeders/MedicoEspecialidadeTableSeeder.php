<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MedicoEspecialidadeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('medico_especialidade')->delete();
        
        \DB::table('medico_especialidade')->insert(array (
            0 => 
            array (
                'id' => 1,
                'medico_id' => 1,
                'especialidade_id' => 1,
                'created_at' => '2021-01-11 00:14:28',
                'updated_at' => '2021-01-11 00:14:28',
            ),
        ));
        
        
    }
}