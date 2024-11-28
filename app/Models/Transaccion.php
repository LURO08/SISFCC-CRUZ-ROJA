<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable = ['receta_medica_id', 'destino'];

    public function receta()
    {
        return $this->belongsTo(RecetaMedica::class);
    }
}
