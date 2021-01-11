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
                'especialidade' => 'Pediatra',
                'descricao' => 'Realizar exames.',
                'created_at' => '2021-01-10 21:53:07',
                'updated_at' => '2021-01-10 21:53:07',
            ),
        ));
        
        
    }
}