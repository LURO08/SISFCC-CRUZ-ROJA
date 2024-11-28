<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteMedico extends Model
{
    use HasFactory;

    // Campos que se pueden llenar mediante asignación masiva
    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'diagnostico',
        'tratamiento',
        'receta_id'
    ];

    // Relación: un expediente pertenece a un paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación: un expediente pertenece a un doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relación: un expediente puede tener una receta asociada
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
