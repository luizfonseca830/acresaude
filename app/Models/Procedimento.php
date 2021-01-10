<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;
    protected $table = 'procedimentos';

    protected $fillable = [
        'medico_id',
        'procedimento'
    ];

    public function medico(){
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }
}
