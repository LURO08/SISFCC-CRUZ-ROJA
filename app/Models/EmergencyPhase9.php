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
        'heperventilacion',
        'descompresión_pleural_con_agua',
        'oxigenoterapia',
        'litros',
        'hemitorax',
        'control_hemorragias',
        'vias_venosas',
        'sitio_aplicacion',
        'tipo_soluciones',
        'soluciones',
        'medicamentos_terapia',
        'rcp_procedimientos',


    ];
}
