<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'usuario' => 'medico',
                'email' => 'luizfonseca830@gmail.com',
                'email_verified_at' => NULL,
                'password' => bcrypt('123456789'),
                'remember_token' => NULL,
                'created_at' => '2021-01-10 21:11:21',
                'updated_at' => '2021-01-10 21:11:21',
            ),
            1 =>
            array (
                'id' => 2,
                'usuario' => 'admin',
                'email' => 'jfsystem830@gmail.com',
                'email_verified_at' => NULL,
                'password' => bcrypt('123456789'),
                'remember_token' => NULL,
                'created_at' => '2021-01-10 21:12:51',
                'updated_at' => '2021-01-10 21:12:51',
            ),
            2 =>
                array (
                    'id' => 3,
                    'usuario' => 'usuario',
                    'email' => 'jfsystem830@hotmail.com',
                    'email_verified_at' => NULL,
                    'password' => bcrypt('123456789'),
                    'remember_token' => NULL,
                    'created_at' => '2021-01-10 21:12:51',
                    'updated_at' => '2021-01-10 21:12:51',
                ),
        ));


    }
}
