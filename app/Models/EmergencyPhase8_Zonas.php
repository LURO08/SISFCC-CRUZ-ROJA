<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emergencyphase8_Zonas extends Model
{
    protected $table = 'emergency_phase8_zonas';
    use HasFactory;

    protected $fillable = [
        'folio',
        'id_phase',
        'zona',
        'coordinate'
    ];

    // Aquí puedes agregar otras relaciones o métodos si es necesario
}
