<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudFactura extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente del plural del nombre del modelo
    protected $table = 'solicitudes_factura';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'cobro_id',
        'nombre',
        'rfc',
        'direccion',
        'telefono',
        'correo',
        'monto',
        'estatus',
    ];

    // Define los valores posibles para el campo 'estatus'
    const ESTATUS_PENDIENTE = 'pendiente';
    const ESTATUS_PROCESADA = 'procesada';
    const ESTATUS_LISTA = 'lista';

    // Casting para tipos de datos específicos
    protected $casts = [
        'fecha_solicitud' => 'datetime',
        'monto' => 'decimal:2',
    ];

    public function cobro()
    {
        return $this->belongsTo(Cobros::class, 'cobro_id');
    }
}
