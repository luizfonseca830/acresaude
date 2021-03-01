<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaMedico extends Model
{
    use HasFactory;

    protected $table = 'agenda_medicos';
    protected $fillable = [
        'medico_especialidade_id',
        'medico_id',
        'title',
        'start',
        'end',
        'intervalo',
        'preco',
        'description'
    ];

    public function medicoEspecialidade()
    {
        return $this->hasOne(MedicoEspecilidade::class, 'id', 'medico_especialidade_id');
    }

    public function agendaConsulta(){
        return $this->hasMany(AgendaConsultas::class, 'agenda_id', 'id');
    }

    public function buscaVaga($id){
        $agenda = AgendaConsultas::whereNull('paciente_id')->where('agenda_id', $id)->get();
        return $agenda;
    }

    public function meusAtendimentos($id){
//        dd($id);
        $atendimentos = AgendaConsultas::where('agenda_id', $id)->whereNull('status_finalizado')->where('status_reserva', '1')->get();
//        dd($atendimentos);
        return $atendimentos;
    }
}
