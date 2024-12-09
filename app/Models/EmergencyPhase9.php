<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase9 extends Model
{
    protected $table = 'Emergency_Phase9';
    use HasFactory;

    // Definir las columnas que se pueden asignar masivamente
    protected $fillable = [
        'folio',
        'via_aerea',
        'control_cervical',
        'asistencia_ventilatoria',
        'FREC',
        'volumen',
        'oxigenoterapia',
        'litros',
        'procedimientos_adicionales',

        'control_hemorragias',
        'vias_venosas',

        'sitio_aplicacion',
        'tipo_soluciones',
        'soluciones',

        'medicamentos_terapia',
        'rcp_procedimientos',


    ];

    // Especificar que 'via_aerea' debe ser tratado como un array
    protected $casts = [
        'via_aerea' => 'array', // Convierte el campo JSON a un array automáticamente
        'asistencia_ventilatoria' => 'array',
        'oxigenoterapia' => 'array',
        'procedimientos_adicionales' => 'array','asistencia_ventilatoria' => 'array',
        'oxigenoterapia' => 'array',
        'procedimientos_adicionales' => 'array',
        'control_hemorragias' => 'array',
        'vias_venosas' => 'array',
        'tipo_soluciones' => 'array',
        'soluciones' => 'array',
        'medicamentos_terapia' => 'array',
        'rcp_procedimientos' => 'array',
    ];
}
