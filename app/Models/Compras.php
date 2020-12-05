<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $fillable = [
        'pessoa_id',
        'informacao_comprar_id',
        'status_compra',
    ];

    public function info_compra(){
        return $this->hasMany(InformacaoCompras::class, 'id', 'informacao_comprar_id');
    }
}
