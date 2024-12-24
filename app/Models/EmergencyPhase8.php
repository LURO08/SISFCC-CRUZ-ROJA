<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase8 extends Model
{
    use HasFactory;

    protected $table = 'Emergency_Phase8';  // Nombre de la tabla
    protected $fillable = [
        'folio',
        'exploracion_fisica',
        'valor',
        'hora_es',
        'fr',
        'fc',
        'tas',
        'tad',
        'spo2',
        'temp',
        'glasgow',
        'trauma_score',
        'ekg',
        'atendido',
        'alergias',
        'medicamentos',
        'antecedentes',
        'ultima_comida',
        'eventos_previos',
        'condicion',
        'estabilidad',
        'prioridad'
    ];  // Columnas que se pueden asignar masivamente

}
