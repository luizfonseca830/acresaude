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
        'documento_comprovante_medico',
        'documento_comprovante_especialidade',
        'status',
        'enviado_confirmacao',
    ];

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }

    public function especialidade(){
        return $this->hasOne(Especilidade::class, 'id', 'especialidade_id');
    }
}
