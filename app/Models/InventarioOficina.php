<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioOficina extends Model
{
    use HasFactory;

    protected $table = 'inventario_oficinas';

    // Los campos que pueden ser llenados mediante asignación masiva
    protected $fillable = [
        'nombre',
        'tipo',
        'cantidad',
        'estado',
        'rutaimg',
    ];
}
