<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'usuario' => 'medico',
            'email' => 'medico@gmail.com',
            'password' => Hash::make('medico123'),
        ],
        [
            'usuario' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]
        );


    }
}
