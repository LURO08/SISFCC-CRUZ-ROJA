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

    public function cobro()
    {
        return $this->belongsTo(Cobros::class, 'cobro_id');
    }

    public function getID()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }
}
