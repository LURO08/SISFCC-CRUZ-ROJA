<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'edad',
        'sexo',
        'tipo_sangre',
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

    public function cobrosServicios()
    {
        return $this->hasMany(CobrosServicios::class, 'paciente_id');
    }
}
