<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

     // La tabla asociada al modelo
     protected $table = 'personal';

     // Los campos que pueden ser llenados mediante asignación masiva
     protected $fillable = [
         'Nombre',
         'apellido_paterno',
         'apellido_materno',
         'Edad',
         'Sexo',
         'FechaNacimiento',
         'Cargo',
         'Departamento',
         'Turno',
         'Telefono',
         'Direccion',
         'user_id',
     ];

     public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
