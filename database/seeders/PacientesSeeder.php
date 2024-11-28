<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('pacientes')->upsert([
            [
                'nombre' => 'Ana',
                'apellidopaterno' => 'Martínez',
                'apellidomaterno' => 'Gómez',
                'edad' => 30,
                'sexo' => 'Femenino',
                'tipo_sangre' => 'O+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Juan',
                'apellidopaterno' => 'Pérez',
                'apellidomaterno' => 'Ramírez',
                'edad' => 45,
                'sexo' => 'Masculino',
                'tipo_sangre' => 'A+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellidopaterno' => 'Hernández',
                'apellidomaterno' => 'Martínez',
                'edad' => 50,
                'sexo' => 'Masculino',
                'tipo_sangre' => 'B+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Brenda',
                'apellidopaterno' => 'Ramírez',
                'apellidomaterno' => 'Castro',
                'edad' => 25,
                'sexo' => 'Femenino',
                'tipo_sangre' => 'AB-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luis',
                'apellidopaterno' => 'Pérez',
                'apellidomaterno' => 'Ramírez',
                'edad' => 40,
                'sexo' => 'Masculino',
                'tipo_sangre' => 'O-',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ], ['nombre', 'apellidopaterno', 'apellidomaterno'], ['edad', 'sexo', 'tipo_sangre', 'updated_at']);
    }
}
