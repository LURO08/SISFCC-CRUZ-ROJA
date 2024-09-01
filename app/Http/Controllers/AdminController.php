<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;



class AdminController extends Controller
{
    public function index()
    {
        // Verificar el rol del usuario
        $role = auth()->user()->roles->pluck('name')->first();

        // Redirigir según el rol del usuario
        switch ($role) {
            case 'admin':
                return view('admin.index');
            case 'doctor':
                return redirect()->route('doctor.index');
            case 'cajero':
                return redirect()->route('cajero.index');
            case 'farmacia':
                return redirect()->route('farmacia.index');
            default:
                return redirect()->route('dashboard')->with('error', 'No tienes permisos para acceder a esta página.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function farmaciaDash()
    {
        return view('admin.dashboardRoles.farmacia');
    }



    public function usuarios()
    {
        $users = User::all();
        return view('admin.users.usuarios', compact('users'));
    }


    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para el formulario de selección
        return view('auth.register', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,doctor,cajero,farmacia'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role)->first();
        $user->assignRole($role);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    public function edit(User $id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    // Validar los datos de entrada
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'role' => ['required', 'string', 'in:admin,doctor,cajero,farmacia'],
        'password' => ['nullable', 'string', 'min:8'], // Contraseña es opcional y debe tener al menos 8 caracteres si se proporciona
    ]);

    // Actualizar la información del usuario
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];

    // Solo actualizar la contraseña si se proporciona
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }

    $user->save();

    // Asignar el rol seleccionado al usuario
    $user->syncRoles([$validatedData['role']]);

    return redirect()->route('admin.users')->with('success', 'User updated successfully.');
}


    public function delete(User $user)
    {
        $user->tokens()->delete(); // Eliminar todos los tokens asociados al usuario
        $user->delete(); // Eliminar el usuario

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

}
