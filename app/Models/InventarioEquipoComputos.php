<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioEquipoComputos extends Model
{
    use HasFactory;

     // La tabla asociada al modelo


     // Los campos que pueden ser llenados mediante asignación masiva
     protected $fillable = [
         'nombre',
         'marca',
         'modelo',
         'tipo',
         'numero_serie',
         'estado',
         'cantidad',
         'rutaimg',

     ];
}
