<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase6 extends Model
{
    use HasFactory;

    protected $table = 'Emergency_Phase6';

    protected $fillable = [
        // Datos de la madre
        'folio',
        'gesta',
        'cesareas',
        'para',
        'aborto',
        'semanas',
        'fechaParto',
        'membranas',
        'fum',
        'horaContracciones',
        'frecuencia',
        'duracion',

        // Datos post-parto
        'horanacimiento',
        'lugar_post_parto',
        'placenta_expulsada',

        // Datos del recién nacido
        'estado_producto',
        'genero_producto',
        'apgar1',
        'apgar5',
    ];
}
