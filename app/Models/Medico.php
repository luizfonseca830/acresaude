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
        'rg',
        'conselho',
        'num_conselho',
        'rqe',
        'telefone',
        'celular',
    ];

    public function agenda(){
        return $this->hasMany(AgendaMedico::class, 'medico_id', 'id');
    }

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function auxEspecialidades(){
        return $this->hasMany(MedicoEspecilidade::class, 'medico_id', 'id');
    }

}
