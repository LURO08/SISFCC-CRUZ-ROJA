<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'fecha_nacimiento',
        'edad',
        'sexo',
        'tipo_sangre',
    ];
}
