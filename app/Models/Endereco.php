<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'endereco';

    protected $fillable = [
        'pessoa_id',
        'uf',
        'cep',
        'endereco',
        'bairro',
        'municipio',
        'complemento',
    ];

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id', 'pessoa_id');
    }
}
