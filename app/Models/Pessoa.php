<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = 'pessoas';
    protected $fillable = [
        'user_id',
        'tipo_usuario_id',
        'nome',
        'sobrenome',
        'cpf',
    ];

    public function tipoUsuario(){
        return $this->hasOne(TipoUsuario::class,'id', 'tipo_usuario_id');
    }
}
