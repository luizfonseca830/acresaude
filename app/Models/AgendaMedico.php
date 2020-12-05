<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaMedico extends Model
{
    use HasFactory;
    protected $table = 'agenda_medicos';
    protected $fillable = [
        'medico_id',
        'title',
        'start',
        'end',
        'description'
    ];
}
