<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaConsultas extends Model
{
    use HasFactory;

    protected $table = 'agenda_consultas';

    protected $fillable = ['paciente_id', 'compra_id', 'agenda_id', 'data_consulta', 'sala_consulta', 'status_finalizado', 'status_reserva'];

    public function paciente(){
        return $this->hasOne(Pessoa::class, 'id', 'paciente_id');
    }

    public function agendaMedico(){
        return $this->hasOne(AgendaMedico::class, 'id', 'agenda_id');
    }
}
