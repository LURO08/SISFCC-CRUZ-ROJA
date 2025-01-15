<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personal;

class cobrosServicios extends Model
{
    use HasFactory;

    protected $table = 'cobros_servicios';

    // Define los atributos que se pueden asignar de forma masiva
    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'receta_id ',
        'personal_id ',
        'nombre',
        'edad',
        'sexo',
        'tipo_sangre',
        'servicios',
        'medicamentos',
        'monto',
        'facturacion',
        'rutaticket',
    ];


    // Define la relación con el modelo Paciente

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personal_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class, 'paciente_id');
    }

    public function Servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicios');
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
