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
                'email' => 'medico@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Jb9KXujWOSilEs7YMDbKGey4oM2qduherPROMckcXqgAXltlRK9pi',
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
                'password' => '$2y$10$8henlYkO8ElqCsSGXoAmzO/PgXpfNUqqJCNAsHd8xrAKTirE4niSS',
                'remember_token' => NULL,
                'created_at' => '2021-01-10 21:12:51',
                'updated_at' => '2021-01-10 21:12:51',
            ),
        ));
        
        
    }
}