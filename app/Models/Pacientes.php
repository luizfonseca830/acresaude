<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = ['user_id'];

    public function consultas(){
        return $this->hasMany(AgendaConsultas::class, 'paciente_id', 'id');
    }
}
