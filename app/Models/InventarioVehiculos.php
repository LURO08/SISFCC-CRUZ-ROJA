<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioVehiculos extends Model
{
    use HasFactory;

     // Los campos que pueden ser llenados mediante asignación masiva
     protected $fillable = [
        'marca',
        'modelo',
        'placa',
        'tipo',
        'año',
        'cantidad',
        'estado',
        'rutaimg',
    ];

    public function scopeAmbulancias($query)
    {
        return $query->where('tipo', 'ambulancia');
    }

    public function scopeHelicopteros($query)
    {
        return $query->where('tipo', 'helicoptero');
    }

}
