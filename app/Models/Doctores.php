<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;

    protected $fillable = [
        'personalid',
        'cedulaProfesional',
        'rutafirma',
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'personalid');
    }
}
