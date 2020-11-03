<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doutores extends Model
{
    use HasFactory;

    protected $table = 'doutores';

    protected $fillable = ['user_id'];

    public function consultas(){
        return $this->hasMany(AgendaConsultas::class, 'doutor_id', 'id');
    }
}
