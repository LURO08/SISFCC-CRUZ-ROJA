<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Especificar la tabla asociada (opcional si sigue las convenciones de Laravel)
    protected $table = 'proveedores';

    // Especificar los campos que se pueden llenar a través de un formulario o en masa
    protected $fillable = [
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'correo',
        'telefono',

    ];
}
