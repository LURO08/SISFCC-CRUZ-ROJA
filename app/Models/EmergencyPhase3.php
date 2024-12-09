<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase3 extends Model
{
    use HasFactory;

    protected $table = 'Emergency_Phase3';

    protected $fillable = [
        'folio',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'edad',
        'meses',
        'sexo',
        'tipo_sangre',
        'domicilio',
        'colonia',
        'alcaldia',
        'telefono',
        'ocupacion',
        'derechohabiente',
        'compania_seguro',
    ];
}
