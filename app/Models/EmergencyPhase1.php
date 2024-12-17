<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase1 extends Model
{
    use HasFactory;

    protected $table = 'emergency_phase1';

    protected $fillable = [
        'hora_llamada',
        'hora_despacho',
        'hora_arribo',
        'hora_traslado',
        'hora_hospital',
        'hora_disponible',
        'motivo_atencion',
        'direccion_accidente',
        'entre_calles_accidente',
        'colonia_accidente',
        'municipio_accidente',
        'lugar_ocurrencia',
        'otro_lugar'
    ];

    public function phases2()
    {
        return $this->hasMany(EmergencyPhase2::class, 'id');
    }

    public function phases3()
    {
        return $this->hasMany(EmergencyPhase3::class, 'folio', 'id');
    }


    public function phases4()
    {
        return $this->hasMany(EmergencyPhase4::class, 'folio');
    }

    public function phases5()
    {
        return $this->hasMany(EmergencyPhase5::class, 'folio');
    }
    public function phase6()
    {
        return $this->hasMany(EmergencyPhase6::class, 'folio');
    }
    public function phase7()
    {
        return $this->hasMany(EmergencyPhase7::class, 'folio');
    }
    public function phase8()
    {
        return $this->hasMany(EmergencyPhase8::class, 'folio');
    }
    public function phase9()
    {
        return $this->hasMany(EmergencyPhase9::class, 'folio');
    }
}
