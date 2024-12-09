<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyPhase4 extends Model
{
    use HasFactory;

    protected $table = 'Emergency_Phase4';

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
    ];
}
