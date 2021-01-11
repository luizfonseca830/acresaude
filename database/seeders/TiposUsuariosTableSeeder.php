<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiposUsuariosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipos_usuarios')->delete();
        
        \DB::table('tipos_usuarios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'Administrador',
                'created_at' => '2021-01-10 21:09:48',
                'updated_at' => '2021-01-10 21:09:48',
            ),
            1 => 
            array (
                'id' => 2,
                'nome' => 'Doutor',
                'created_at' => '2021-01-10 21:09:48',
                'updated_at' => '2021-01-10 21:09:48',
            ),
            2 => 
            array (
                'id' => 3,
                'nome' => 'Paciente',
                'created_at' => '2021-01-10 21:09:48',
                'updated_at' => '2021-01-10 21:09:48',
            ),
        ));
        
        
    }
}