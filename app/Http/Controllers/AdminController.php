<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctores;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\ResetsUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\SolicitudFactura;
use App\Models\Medicamentos;
use App\Models\RecetaMedica;
use App\Models\ExpedienteMedico;
use App\Models\pacientes;
use App\Models\Servicio;
use App\Models\Cobros;
use App\Models\Personal;
use PDF;
use Carbon\Carbon;  // Importa Carbon



class AdminController extends Controller
{
    public function index(Request $request)

    {
        $medicamentos = Medicamentos::paginate(3);
        $todosLosMedicamentos  = Medicamentos::all();
        $facturas = SolicitudFactura::all();
        $pacientes = Pacientes::all();
        $servicios = Servicio::all();

        return view('admin.index',compact('facturas', 'medicamentos','pacientes','servicios','todosLosMedicamentos'));
    }


    public function register()
    {
        return view('auth.register');
    }

    public function farmaciaDash()
    {
        // Cargar las facturas (si es necesario).
        $facturas = SolicitudFactura::all();

        // Cargar los medicamentos con paginación para la vista.
        $medicamentos = Medicamentos::paginate(3);

        // Obtener todos los medicamentos (sin paginación) para la búsqueda.
        $todosLosMedicamentos = Medicamentos::all()->map(function($medicamento) {
            $medicamento->folio = $medicamento->getID();
            $medicamento->imagen_url = $medicamento->imagen ? asset( $medicamento->imagen) : null;
            $medicamento->eliminarruta = route('farmacia.product.destroy', $medicamento->id);
            return $medicamento;
        });

        // Retornar la vista con los datos necesarios.
        return view('admin.farmacia.medicamentos.index', compact('medicamentos', 'facturas', 'todosLosMedicamentos'));
    }

    public function consultorioIndex(){
        $todosLosPacientes = Pacientes::all()->map(function($pacientes) {
            $pacientes->folio = $pacientes->getID();
            return $pacientes;
        });
        $pacientes = Pacientes::paginate(4);
        $facturas = SolicitudFactura::all();

        return view('admin.consultorio.index', compact('pacientes','facturas','todosLosPacientes'));
    }

    public function generarReporte(Request $request)
{
    // Validación de los datos recibidos
    $request->validate([
        'tipo_reporte' => 'required|string|in:pacientes,medicamentos,doctores,cobros',
        'rango_fecha' => 'nullable|string|in:todos,desde_fecha,rango_fechas',
        'fecha_inicio' => 'nullable|date',
        'fecha_fin' => 'nullable|date',
        'filtro_avanzado' => 'nullable|string',
    ]);

    // Inicializamos la variable de consulta dependiendo del tipo de reporte
    $reporte = null;

    // Obtener el tipo de reporte
    switch ($request->tipo_reporte) {
        case 'pacientes':
            $reporte = Pacientes::query();
            break;

        case 'medicamentos':
            $reporte = Medicamentos::query();
            break;

        case 'doctores':
            $reporte = Doctores::query();
            break;

        case 'cobros':
            $reporte = Cobros::query();
            break;
    }

    // Filtrar por fechas si se aplica
    if ($request->rango_fecha == 'desde_fecha' && $request->fecha_inicio) {
        $reporte->whereDate('created_at', '>=', Carbon::parse($request->fecha_inicio)->toDateString());
    } elseif ($request->rango_fecha == 'rango_fechas' && $request->fecha_inicio && $request->fecha_fin) {
        $reporte->whereDate('created_at', '>=', Carbon::parse($request->fecha_inicio)->toDateString())
            ->whereDate('created_at', '<=', Carbon::parse($request->fecha_fin)->toDateString());
    }

    // Filtro avanzado (por nombre, ID, etc.)
    if ($request->filtro_avanzado) {
        $reporte->where(function ($query) use ($request) {
            $query->where('nombre', 'like', '%' . $request->filtro_avanzado . '%')
                  ->orWhere('id', 'like', '%' . $request->filtro_avanzado . '%');
        });
    }

    // Obtener los resultados
    $resultados = $reporte->get();

    // Formatear los datos adicionales para el caso de 'cobros'
    if ($request->tipo_reporte == 'cobros') {
        $resultados = $resultados->map(function ($repor) {
            $repor->folio = $repor->getID();
            $repor->fecha = $repor->getFecha();
            $repor->hora = $repor->getHora();
            foreach ($repor->receta->medicamentos as $medica) {
                $cantidad = $medica->cantidad ?? 0;
                $precioUnitario = $medica->medicamento->precio ?? 0;
                $repor->preciototal +=  $cantidad * $precioUnitario;
            }
            if($repor->facturación = 1){
                $repor->facturo = "Si";
            }else{
                $repor->facturo = "No";
            }

            return $repor;
        });
    }



    $pdf = PDF::loadView('pdf.resultados_pdf', compact('resultados'));

    // Descargar el PDF
    return $pdf->stream('reporte-' . $request->tipo_reporte . '.pdf');
}

    public function personal(){
        $personals = Personal::all();
        $doctores = Doctores::all();
        $usuarios  = User::all();

        return view('admin.personal.index', compact('personals','usuarios'));
    }

    public function usuarios()
    {
        $users = User::all();
        $doctores = Doctores::all();

        return view('admin.usuarios.index', compact('users','doctores'));

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
            'nombre' => ['nullable', 'string', 'max:255'],
            'apellidoPaterno' => ['nullable', 'string', 'max:255'],
            'apellidoMaterno' => ['nullable', 'string', 'max:255'],
            'cedulaProfesional' => ['nullable', 'string', 'max:255'],
            'rutafirma' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('name', $request->role)->first();
        $user->assignRole($role);

        // dd($request);
        // Si el rol es doctor, crear el registro del doctor
        if ($request->role == 'doctor') {

            // Procesamiento de la imagen
            if ($request->hasFile('rutafirma')) {
                $nombreImagen = time() . '_' . $request->file('rutafirma')->getClientOriginalName();
                $rutaImagen = 'images/doctores/firmas/' . $nombreImagen;
                $request->file('rutafirma')->move(public_path('images/doctores/firmas/'), $nombreImagen);
            } else {
                $rutaImagen = 'images/doctores/firmas/default.png'; // Imagen por defecto si no se proporciona una
            }

            Doctores::create([
                'userid' => $user->id,
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoPaterno,
                'apellidoMaterno' => $request->apellidoMaterno,
                'cedulaProfesional' => $request->cedulaProfesional,
                'rutafirma' => $rutaImagen,
            ]);
        }

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
        $doctor = Doctores::where('userid', $user->id)->first();
        if ($doctor) {
            if (method_exists($doctor, 'tokens')) {
                $doctor->tokens()->delete();
            }
            if ($doctor->rutafirma && file_exists(public_path($doctor->rutafirma))) {
                unlink(public_path($doctor->rutafirma));
            }
            $doctor->delete();

        }
        $user->tokens()->delete();
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function deleteDoctor(Doctores $doctor)
    {
        $usuario = User::where('id', $doctor->userid)->first();
        if($usuario){
            $usuario->tokens()->delete();
            $usuario->delete();
        }
        if (method_exists($doctor, 'tokens')) {
            $doctor->tokens()->delete();
        }
        if ($doctor->rutafirma && file_exists(public_path($doctor->rutafirma))) {
            unlink(public_path($doctor->rutafirma));
        }
        $doctor->delete();

        return redirect()->route('admin.users')->with('success', 'Doctor eliminado correctamente.');
    }


     // Métodos para Servicio
     public function storeServicio(Request $request)
     {
         $request->validate([
             'nombre' => 'required|string|max:255',
             'icono' => 'required|string',
             'costo' => 'nullable|numeric|between:0,999999.99',
             'descripcion' => 'required|string',
         ]);

         $servicio = new Servicio();
         $servicio->nombre = $request->nombre;
         $servicio->icono = $request->icono;
         $servicio->costo = $request->costo;
         $servicio->descripcion = $request->descripcion;
         $servicio->save();

         return response()->json(['message' => 'Servicio creado exitosamente']);
     }

     public function updateServicio(Request $request, $id)
     {
         $request->validate([
             'nombre' => 'required|string|max:255',
             'icono' => 'required|string',
             'costo' => 'nullable|numeric|between:0,999999.99',
             'descripcion' => 'required|string',
         ]);

         $servicio = Servicio::findOrFail($id);
         $servicio->update($request->all());

         return response()->json(['message' => 'Servicio actualizado exitosamente']);
     }

     public function destroyServicio($id)
     {
         $servicio = Servicio::findOrFail($id);
         $servicio->delete();

         return response()->json(['message' => 'Servicio eliminado exitosamente']);
     }

       // Métodos para Factura
    public function storeFactura(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'monto' => 'required|numeric|between:0,99999999.99',
            'estado' => 'required|string|max:255',
        ]);

        $factura = new Factura();
        $factura->cliente_id = $request->cliente_id;
        $factura->monto = $request->monto;
        $factura->estado = $request->estado;
        $factura->save();

        return response()->json(['message' => 'Factura creada exitosamente']);
    }

    public function updateFactura(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric|between:0,99999999.99',
            'estado' => 'required|string|max:255',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        return response()->json(['message' => 'Factura actualizada exitosamente']);
    }

    public function destroyFactura($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return response()->json(['message' => 'Factura eliminada exitosamente']);
    }


    public function adminfarmacia(){


        return view('admin.farmacia.admin');
    }



}
