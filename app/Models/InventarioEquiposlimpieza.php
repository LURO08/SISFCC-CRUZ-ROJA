<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioEquiposlimpieza extends Model
{
    use HasFactory;

    protected $table = 'equipos_limpieza';

    protected $fillable = [
        'articulo',
        'marca',
        'tipo',
        'presentacion',
        'cantidad',
        'rutaimg',
    ];
}
