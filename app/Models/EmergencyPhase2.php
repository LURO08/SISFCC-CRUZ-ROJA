<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase2 extends Model
{
    use HasFactory;

    protected $table = 'emergency_phase2';

    protected $fillable = [
        'folio',
        'ambulance_id',
        'chofer_id',
        'paramedico_id',
        'helicoptero_id',
    ];

    public function ambulance()
    {
        return $this->belongsTo(InventarioVehiculos::class, 'ambulance_id')
                    ->where('tipo', 'ambulancia'); // Asegura que solo se relaciona con ambulancias
    }

    public function chofer()
    {
        return $this->belongsTo(Personal::class, 'chofer_id')
                    ->where('Cargo', 'chofer'); // Asegura que solo se relaciona con choferes
    }

    /**
     * Relación con la tabla de personal (paramédico).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paramedico()
    {
        return $this->belongsTo(Personal::class, 'paramedico_id')
                    ->where('Cargo', 'paramédico'); // Asegura que solo se relaciona con paramédicos
    }

    /**
     * Relación con la tabla de vehículos (helicóptero).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function helicoptero()
    {
        return $this->belongsTo(InventarioVehiculos::class, 'helicoptero_id')
                    ->where('tipo', 'helicoptero'); // Asegura que solo se relaciona con helicópteros
    }

    /**
     * Scope para filtrar por una ambulancia específica.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $ambulanceId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByAmbulance($query, $ambulanceId)
    {
        return $query->where('ambulance_id', $ambulanceId);
    }

    /**
     * Scope para filtrar por un chofer específico.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $choferId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByChofer($query, $choferId)
    {
        return $query->where('chofer_id', $choferId);
    }

    /**
     * Scope para filtrar por un paramédico específico.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $paramedicoId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByParamedico($query, $paramedicoId)
    {
        return $query->where('paramedico_id', $paramedicoId);
    }

    /**
     * Scope para filtrar por un helicóptero específico.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $helicopteroId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByHelicoptero($query, $helicopteroId)
    {
        return $query->where('helicoptero_id', $helicopteroId);
    }

    /**
     * Verifica si la fase de emergencia está completa (todos los datos están presentes).
     *
     * @return bool
     */
    public function isComplete()
    {
        return $this->ambulance_id && $this->chofer_id && $this->paramedico_id;
    }
}
