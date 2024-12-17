<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetaMedica extends Model
{
    use HasFactory;
    protected $table = 'receta_medicas';

    // Campos que se pueden llenar mediante asignación masiva
    protected $fillable = [
        'paciente_id',
        'doctor_id',
        'nombre_paciente',
        'presion_arterial',
        'temperatura',
        'talla',
        'peso',
        'alergia',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'saturacion_oxigeno',
        'diagnostico',
        'tratamiento',
        'material',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Pacientes::class);
    }

    // Relación con el modelo Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctores::class);
    }

    public function medicamentos()
{
    return $this->hasMany(MedicamentoSurtido::class, 'receta_id');
}

    public function transaccions()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function folio()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }
}
