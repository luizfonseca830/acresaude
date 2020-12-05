<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacaoCompras extends Model
{
    use HasFactory;
    protected $table = 'informacao_compras';
    protected $fillable = [
        'nome_completo',
        'numero_cartao',
        'data_vencimento',
    ];
}
