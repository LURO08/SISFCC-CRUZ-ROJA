<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio; // Asegúrate de importar el modelo Servicio

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array de servicios a crear o actualizar
        $servicios = [
            [
                'nombre' => 'Consulta Médica General',
                'costo' => 300,
                'descripcion' => 'Consulta médica general para evaluación y diagnóstico inicial. Incluye examen básico y recomendaciones de tratamiento.',
                'icono' => '🩺',
            ],
            [
                'nombre' => 'Servicio de Ambulancia',
                'costo' => 1500,
                'descripcion' => 'Servicio de traslado en ambulancia equipado para emergencias. Disponible 24/7 en la zona de cobertura.',
                'icono' => '🚑',
            ],
            [
                'nombre' => 'Donación de Sangre',
                'costo' => 0,
                'descripcion' => 'Donación de sangre voluntaria para pacientes necesitados. Se realizan pruebas de seguridad previas al proceso.',
                'icono' => '💉',
            ],
        ];

        // Insertar o actualizar servicios en la base de datos
        foreach ($servicios as $servicioData) {
            Servicio::updateOrCreate(
                ['nombre' => $servicioData['nombre']], // Condición para identificar si el servicio existe
                [
                    'costo' => $servicioData['costo'],
                    'descripcion' => $servicioData['descripcion'],
                    'icono' => $servicioData['icono'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
