<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceService extends Model
{
    use HasFactory;

    protected $table = 'ambulance_services';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'ambulance_id',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * Relación con el modelo InventarioVehiculos.
     */
    public function ambulancia()
    {
        return $this->belongsTo(InventarioVehiculos::class, 'ambulance_id');
    }
}
