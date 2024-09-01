<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Iniciar una transacción para asegurar atomicidad
        DB::transaction(function () {
            // Crear usuario admin
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'), // Mejor usar Hash::make
            ]);
            $admin->assignRole('admin');

            // Crear usuario para farmacia
            $farmacia = User::create([
                'name' => 'farmacia User',
                'email' => 'farmacia@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
            $farmacia->assignRole('farmacia');

            // Crear usuario para doctor
            $doctor = User::create([
                'name' => 'Doctor User',
                'email' => 'doctor@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
            $doctor->assignRole('doctor');

            // Crear usuario para cajero
            $cajero = User::create([
                'name' => 'Cajero User',
                'email' => 'cajero@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
            $cajero->assignRole('cajero');
        });
    }
}
