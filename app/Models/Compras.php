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
        'pagarme_id',
        'status_compra',
    ];


    public function agendaConsulta(){
        return $this->hasOne(AgendaConsultas::class, 'compra_id', 'id');
    }
}
