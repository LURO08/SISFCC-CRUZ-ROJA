<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    // Define los atributos que se pueden asignar de forma masiva
    protected $fillable = [
        'paciente_id', // Relación con el paciente
        'monto', // Monto total de la factura
        'estado', // Estado de la factura (ej. pagada, pendiente, cancelada)
        'fecha', // Fecha de emisión de la factura
    ];

    /**
     * Relación con el modelo Paciente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    /**
     * Formatea el estado de la factura para una mejor visualización.
     *
     * @return string
     */
    public function getEstadoFormattedAttribute()
    {
        return ucfirst($this->estado); // Capitaliza el estado
    }

    /**
     * Calcula el IVA (Impuesto al Valor Agregado) sobre el monto.
     *
     * @param float $tasa
     * @return float
     */
    public function calcularIVA($tasa = 0.16)
    {
        return $this->monto * $tasa; // Retorna el IVA calculado
    }

    /**
     * Obtiene la fecha de emisión de la factura en un formato legible.
     *
     * @return string
     */
    public function getFechaFormattedAttribute()
    {
        return $this->fecha->format('d/m/Y H:i'); // Retorna la fecha formateada
    }
}
