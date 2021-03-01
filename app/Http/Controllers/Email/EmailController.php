<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function index($trasacao){
        return view('emails.confirmation-shop', [
            'transacao' => $trasacao
        ]);
    }
}
