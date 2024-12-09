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

    public function getFecha()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getHora()
    {
        return $this->created_at->format('H:i');
    }

    public function getID()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }

}
