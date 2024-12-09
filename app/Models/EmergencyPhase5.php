<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase5 extends Model
{
    use HasFactory;

    protected $table = 'Emergency_Phase5';

    protected $fillable = [
        'folio',
        'agente_causal',
        'especificar',
        'lesionescausadas',
        'tipo_accidente',
        'atropelladopor',
        'colision',
        'contraobjeto',
        'impacto',
        'hundimiento',
        'parabrisas',
        'volante',
        'bolsaaire',
        'cinturon',
        'dentrovehiculo',
        'origen_probable',
        'especificarOrigen',
        'primeravez',
        'subsecuente',
    ];
}
