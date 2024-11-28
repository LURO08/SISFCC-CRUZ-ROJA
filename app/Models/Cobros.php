<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobros extends Model
{
    use HasFactory;

    // Define los atributos que se pueden asignar de forma masiva
    protected $fillable = [
        'paciente_id',
        'receta_id',
        'nombre',
        'servicio',
        'monto',
        'fecha',
        'facturacion',
        'rutaticket',
    ];


    public function receta()
{
    return $this->belongsTo(RecetaMedica::class, 'receta_id');
}
    // Define la relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }

    public function Servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio');
    }

    // Método para obtener el monto formateado
    public function getMontoFormattedAttribute()
    {
        return number_format($this->monto, 2);
    }


    // Método para obtener la fecha formateada
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
