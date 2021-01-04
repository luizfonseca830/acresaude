<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoEspecilidade extends Model
{
    use HasFactory;
    protected $table = 'medico_especialidade';
    protected $fillable = [
        'medico_id',
        'especialidade_id'
    ];

    public function medico(){
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }

    public function especialidade(){
        return $this->hasOne(Especilidade::class, 'id', 'especialidade_id');
    }
}
