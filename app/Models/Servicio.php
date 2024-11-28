<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    // Define los atributos que son asignables
    protected $fillable = [
        'id',
        'nombre',
        'costo',
        'descripcion',
        'icono'
    ];

    // Si estás utilizando timestamps, asegúrate de que estén habilitados (por defecto, están habilitados)
    public $timestamps = false; // Cambia esto a true si deseas usar created_at y updated_at

    // Método para obtener una representación de cadena del servicio (opcional)
    public function __toString()
    {
        return $this->nombre;
    }
}
