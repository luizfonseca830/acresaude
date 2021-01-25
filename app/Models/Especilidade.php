<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especilidade extends Model
{
    use HasFactory;
    protected $table = 'especialidades';
    protected $fillable = [
        'id',
        'especialidade',
        'descricao'
    ];

    public function medicoEspecialidade(){
        return $this->hasMany(MedicoEspecilidade::class, 'especialidade_id', 'id');
    }
}
