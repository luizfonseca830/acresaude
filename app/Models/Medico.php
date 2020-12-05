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
}
