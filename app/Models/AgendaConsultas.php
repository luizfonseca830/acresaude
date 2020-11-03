<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaConsultas extends Model
{
    use HasFactory;

    protected $table = 'agenda_consultas';

    protected $fillable = ['paciente_id', 'doutor_id', 'data_consulta', 'sala_consulta'];


}
