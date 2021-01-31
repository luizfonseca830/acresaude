<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;
    protected $table = "solicatacoes";
    protected $fillable = [
        'pessoa_id',
        'especialidade_id',
        'conselho',
        'num_conselho',
        'rqe',
        'rg',
        'telefone',
        'celular',
        'procedimento',
        'status',
        'enviado_confirmacao',
    ];

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function especialidade(){
        return $this->hasOne(Especialidade::class, 'id', 'especialidade_id');
    }
}
