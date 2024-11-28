<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(RolesUsersSeeder::class);
        $this->call(MedicamentosSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(PacientesSeeder::class);
    }
}
