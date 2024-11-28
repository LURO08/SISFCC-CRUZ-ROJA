<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctores;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class RolesUsersSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $this->createRoles();

        // Iniciar una transacción para asegurar atomicidad
        DB::transaction(function () {
            // Crear o actualizar usuarios
            $this->createUser('Admin User', 'admin@gmail.com', 'admin');
            $this->createUser('Farmacia User', 'farmacia@gmail.com', 'farmacia');
            $this->createUser('Doctor User', 'doctor@gmail.com', 'doctor');
            $this->createUser('Cajero User', 'cajero@gmail.com', 'cajero');
        });
    }

    /**
     * Crear los roles necesarios.
     */
    protected function createRoles(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'doctor']);
        Role::firstOrCreate(['name' => 'cajero']);
        Role::firstOrCreate(['name' => 'farmacia']);
    }

    /**
     * Crea o actualiza un usuario y le asigna un rol.
     */
    protected function createUser(string $name, string $email, string $role): void
    {
        // Crear o actualizar usuario por correo electrónico
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make('12345678'), // Mejor usar Hash::make para seguridad
            ]
        );

        // Si el rol es doctor, crear o actualizar el registro en la tabla Doctores
        // if ($role === 'doctor') {
        //     Doctores::updateOrCreate(
        //         ['userid' => $user->id],
        //         [
        //             'nombre' => 'Jose Luis',
        //             'apellidoPaterno' => 'Romero',
        //             'apellidoMaterno' => 'Palacios',
        //             'cedulaProfesional' => '43984334',
        //             'rutafirma' => 'images/doctores/firmas/firma1.png',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]
        //     );
        // }

        // Asignar rol si aún no lo tiene
        if (!$user->hasRole($role)) {
            $user->syncRoles([$role]);
        }
    }
}
