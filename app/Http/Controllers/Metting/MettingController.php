<?php

namespace App\Http\Controllers\Metting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MettingController extends Controller
{
    //
    public function index(){
        $metting_option = [
            'time_max_call' => 15,
            'name_room' => Hash::make('consulta_1'),
            'user_name' => 'Anderson',
        ];

        return view('atendimento', [
            'metting_option' => $metting_option,
        ]);
    }

}
