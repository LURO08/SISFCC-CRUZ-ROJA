<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedicamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('medicamentos')->upsert([
            [
                'nombre' => 'Paracetamol',
                'descripcion' => 'Analgésico y antipirético',
                'dosis' => '500',
                'medida' => 'mg',
                'cantidad' => 100,
                'caducidad' => Carbon::now()->addYear(),
                'precio' => 10.50,
                'imagen' => 'images/medicamentos/paracetamol.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ibuprofeno',
                'descripcion' => 'Antiinflamatorio no esteroideo',
                'dosis' => '200',
                'medida' => 'mg',
                'cantidad' => 50,
                'caducidad' => Carbon::now()->addMonths(6),
                'precio' => 15.75,
                'imagen' => 'images/medicamentos/ibuprofeno.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Amoxicilina',
                'descripcion' => 'Antibiótico de amplio espectro',
                'dosis' => '500',
                'medida' => 'mg',
                'cantidad' => 30,
                'caducidad' => Carbon::now()->addMonths(9),
                'precio' => 20.00,
                'imagen' => 'images/medicamentos/amoxicilina.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Clonazepam',
                'descripcion' => 'Ansiolítico y antiepiléptico',
                'dosis' => '250',
                'medida' => 'mg',
                'cantidad' => 20,
                'caducidad' => Carbon::now()->addMonths(12),
                'precio' => 35.00,
                'imagen' => 'images/medicamentos/clonazepam.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Naproxeno',
                'descripcion' => 'Antiinflamatorio y analgésico',
                'dosis' => '250',
                'medida' => 'mg',
                'cantidad' => 40,
                'caducidad' => Carbon::now()->addMonths(8),
                'precio' => 12.00,
                'imagen' => 'images/medicamentos/naproxeno.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ambroxol',
                'descripcion' => 'Mucolítico para tratamiento de la tos',
                'dosis' => '500',
                'medida' => 'mg',
                'cantidad' => 25,
                'caducidad' => Carbon::now()->addMonths(10),
                'precio' => 18.50,
                'imagen' => 'images/medicamentos/ambroxol.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ], ['nombre'], ['descripcion', 'dosis', 'medida', 'cantidad', 'caducidad', 'precio', 'imagen', 'updated_at']);
    }
}
