<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    protected $fillable = [
        'pessoa_id',
        'especialidade_medico_id',
    ];

    public function agenda(){
        return $this->hasMany(AgendaMedico::class, 'medico_id', 'id');
    }

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function especialide(){
        return $this->hasOne(EspecilidadeMedico::class, 'id', 'especialidade_medico_id');
    }
}
