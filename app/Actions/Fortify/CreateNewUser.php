<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Doctores;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input, Request $request)
{
    // Validar los datos de entrada
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'role' => ['required', 'string', 'in:admin,doctor,cajero,farmacia'],
        'nombre' => ['nullable', 'string', 'max:255'],
        'apellido_Paterno' => ['nullable', 'string', 'max:255'],
        'apellido_Materno' => ['nullable', 'string', 'max:255'],
        'cedulaProfecional' => ['nullable', 'string', 'max:255'],
        'rutafirma' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ])->validate();

    // Crear el usuario
    $user = User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
    ]);

        $doctor = Doctores::create([
            'nombre' => $input['nombre'],
            'apellido_Paterno' => $input['apellido_Paterno'],
            'apellido_Materno' => $input['apellido_Materno'],
            'cedulaProfecional' => $input['cedulaProfecional'],
            'rutafirma' => null, // Inicializar la ruta de la firma como null
        ]);


    // Asignar el rol al usuario
    $user->assignRole($input['role']);

    return $user;
}

}

