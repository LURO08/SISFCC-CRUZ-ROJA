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

    public function getFecha()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getHora()
    {
        return $this->created_at->format('H:i');
    }

    public function getID()
    {
        return str_pad($this->attributes['id'], 3, '0', STR_PAD_LEFT);
    }
}
