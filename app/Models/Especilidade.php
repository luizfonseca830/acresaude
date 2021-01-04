<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especilidade extends Model
{
    use HasFactory;
    protected $table = 'especialidades';
    protected $fillable = [
        'especialidade',
        'descricao'
    ];
}
