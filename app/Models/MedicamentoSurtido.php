<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicamentos;

class MedicamentoSurtido extends Model
{
    use HasFactory;

    protected $table = 'medicamentossurtidos'; // Asegúrate de que este nombre sea correcto.

    protected $fillable = [
        'receta_id',
        'medicamento_id',
        'cantidad',
        'paciente_id',
    ];

    public function paciente()
    {
        return $this->belongsTo(Pacientes::class);
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamentos::class, 'medicamento_id');
    }


    public function receta()
    {
        return $this->belongsTo(RecetaMedica::class, 'receta_id');
    }

    /**
     * Calcula el precio total del medicamento en función de la cantidad.
     *
     * @return float
     */
    public function PrecioTotalporMedicamento()
    {
        $precioUnitario = $this->medicamento->precio ?? 0; // Obtén el precio del medicamento o usa 0 si es nulo.
        return round($precioUnitario * $this->cantidad, 2);
    }

    /**
     * Calcula el total de todos los medicamentos surtidos para una receta específica.
     *
     * @param int $recetaId ID de la receta.
     * @return float
     */
    public static function calcularTotalPorReceta()
    {
        return self::where('id', 'receta_id')
            ->with('medicamento') // Cargamos la relación para acceder al precio.
            ->get()
            ->sum(function ($medicamentoSurtido) {
                return $medicamentoSurtido->precio_total;
            });
    }
}
