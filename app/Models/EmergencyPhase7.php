<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase7 extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'Emergency_Phase7';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'folio',
        'paciente_id',
        'nivel_conciencia',
        'viaaerea',
        'reflejo_deglutacion',
        'ventilacion_observacion',
        'ventilacion_auscultacion',
        'ventilacion_hemitorax',
        'ventilacion_sitio',
        'circulacion_pulsos',
        'circulacion_calidad',
        'circulacion_piel',
        'circulacion_caracteristicas',
    ];

    /**
     * Relación con el modelo Paciente.
     */
    public function PacienteEmergency()
    {
        return $this->belongsTo(EmergencyPhase3::class, 'paciente_id');
    }
}
