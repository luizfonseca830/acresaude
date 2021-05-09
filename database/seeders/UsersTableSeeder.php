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
                'usuario' => 'enoque.araujo',
                'email' => 'enoque.araujo0@gmail.com',
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
                'email' => 'admin@gmail.com',
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
                    'email' => 'usuario@hotmail.com',
                    'email_verified_at' => NULL,
                    'password' => bcrypt('123456789'),
                    'remember_token' => NULL,
                    'created_at' => '2021-01-10 21:12:51',
                    'updated_at' => '2021-01-10 21:12:51',
                ),
            3 =>
                array (
                    'id' => 4,
                    'usuario' => 'rayssa',
                    'email' => 'rayssa@hotmail.com',
                    'email_verified_at' => NULL,
                    'password' => bcrypt('123456789'),
                    'remember_token' => NULL,
                    'created_at' => '2021-01-10 21:12:51',
                    'updated_at' => '2021-01-10 21:12:51',
                ),
        ));


    }
}
