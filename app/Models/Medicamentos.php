<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'dosis',
        'medida',
        'cantidad',
        'caducidad',
        'precio',
        'imagen',
    ];

    /**
     * Formatea el ID como un número de tres dígitos, e.g., "001".
     *
     * @return string
     */
    public function getID()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }

    /**
     * Devuelve la URL completa de la imagen.
     *
     * @return string
     */
    public function imagen()
    {
        return asset($this->attributes['imagen']);
    }
}
