<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'donaciones';

    // Especificar los campos que se pueden llenar mediante asignación masiva
    protected $fillable = [
        'donacion_id',
        'nombredonante',
        'fecha_donacion',
        'medicamento_id',
        'medicamento_cantidad',
    ];

    // Relación con el modelo Medicamento (si existe un modelo relacionado con medicamentos)
    public function medicamentos()
    {
        return $this->belongsTo(Medicamentos::class, 'medicamento_id');
    }

}
