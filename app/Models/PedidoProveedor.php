<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProveedor extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla asociada
    protected $table = 'pedidos_proveedor';

    // Los campos que se pueden asignar en masa (mass assignable)
    protected $fillable = [
        'pedido_id',
        'id_proveedor',
        'medicamento_id',
        'medicamento_cantidad'
    ];

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    // Relación con el modelo Medicamento
    public function medicamento()
    {
        return $this->belongsTo(Medicamentos::class, 'medicamento_id');
    }
}
