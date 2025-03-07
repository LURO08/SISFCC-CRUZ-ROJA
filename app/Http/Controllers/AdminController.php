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
        $pacientesall = Pacientes::all()->map(function($pacientes) {
            $pacientes->folio = $pacientes->getID();
            return $pacientes;
        });
        $pacientes = Pacientes::paginate(4);
        $facturas = SolicitudFactura::all();

        return view('admin.consultorio.index', compact('pacientes','facturas','pacientesall'));
    }

    public function generarReporte(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'tipo_reporte' => 'required|string|in:pacientes,medicamentos,doctores,cobros,facturas',
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
            case 'facturas':
                $reporte = SolicitudFactura::query();
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

                $repor->facturo = $repor->facturación == 1 ? 'Si' : 'No';

                return $repor;
            });
        }



        $pdf = PDF::loadView('pdf.resultados_pdf', compact('resultados'));
        return $pdf->download('reporte-' . $request->tipo_reporte . '.pdf');
    }

    public function reportes(){

        return view('admin.reportes.index');
    }

    public function personal(){
        $personals = Personal::all();
        $doctores = Doctores::all();
        $usuarios  = User::all();
        $personalsall = Personal::paginate(3);

        return view('admin.personal.index', compact('personals','usuarios','personalsall'));
    }

    public function facturas(){
        $solicitudesFactura  = SolicitudFactura::all();

        return view('admin.facturas.index', compact('solicitudesFactura'));
    }

    public function facturadownload($id)
    {
        // Obtén la solicitud de factura
        $solicitud = SolicitudFactura::findOrFail($id);
        // Cambiar el estatus a 'procesando'
        $solicitud->estatus = 'procesada';
        $solicitud->save();  // Si deseas guardar el cambio en la base de datos

        // Inicializar preciototal
        $solicitud->preciototal = 0;

        // Verificar si el cobro y la receta están presentes
        if ($solicitud->cobro && $solicitud->cobro->receta && $solicitud->cobro->receta->medicamentos) {
            foreach ($solicitud->cobro->receta->medicamentos as $medica) {
                $cantidad = $medica->cantidad ?? 0;
                $precioUnitario = $medica->medicamento->precio ?? 0;
                $solicitud->preciototal += $cantidad * $precioUnitario;
            }
        }

        // Cargar la vista para generar el PDF
        $pdf = PDF::loadView('pdf.factura', compact('solicitud'));

        // Descargar el archivo PDF
        return $pdf->download('solicitud_factura_' . $solicitud->id . '.pdf');
    }

    public function subirFactura(Request $request, $id)
    {
        // Validación del archivo
        $request->validate([
            'factura' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240', // Solo PDF y imágenes, máximo 10MB
        ]);

        // Encuentra la solicitud correspondiente
        $solicitud = SolicitudFactura::findOrFail($id);

        // Verifica si ya existe una factura asociada y la elimina
        if ($solicitud->rutafactura && file_exists(public_path('facturas/' . $solicitud->rutafactura))) {
            // Elimina el archivo anterior si existe
            unlink(public_path($solicitud->rutafactura));
        }
        // Procesamiento de la nueva factura
        if ($request->hasFile('factura')) {
            // Genera un nombre único para el archivo
            $nombreImagen = time() . '_' . $id . '.pdf';
            $rutaImagen = 'facturas/' . $nombreImagen;

            // Mueve el archivo a la carpeta 'facturas' en 'public'
            $request->file('factura')->move(public_path('facturas'), $nombreImagen);
        }

        // Actualiza la ruta de la factura en la solicitud
        $solicitud->rutafactura = $rutaImagen;
        $solicitud->estatus = 'lista';
        $solicitud->save();

        // Redirige con un mensaje de éxito
        return redirect()->back()->with('success', 'Factura subida con éxito');
    }

    public function usuarios()
    {
        $users = User::paginate(4);
        $doctores = Doctores::all();
        $userssall = User::with('roles')->get();

        return view('admin.usuarios.index', compact('users','doctores','userssall'));

    }

    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para el formulario de selección
        return view('auth.register', compact('roles'));
    }

    // Agregar Usuario
    public function store(Request $request)
    {
        // Validación de los datos del formulario excepto la validación única del correo
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'in:admin,doctor,cajero,farmacia,socorros,almacenista'],
        ]);

        // Verificar si el correo ya existe
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'El correo electrónico ya está registrado. Por favor, elige otro.');
        }

            // Crear el usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Asignar el rol al usuario
            $role = Role::where('name', $request->role)->first();
            $user->assignRole($role);

            return redirect()->back()->with('success', 'Usuario creado exitosamente.');
    }

    // Editar Usuario
    public function edit(User $id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    // Actualizar Usuarios
    public function update(Request $request, User $user)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
           'role' => ['required', 'string', 'in:admin,doctor,cajero,farmacia,socorros,almacenista'],
            'password' => ['nullable', 'string', 'min:8'], // Contraseña es opcional y debe tener al menos 8 caracteres si se proporciona
        ]);

        if (User::where('email', $request->email)
        ->where('id', '!=', $user->id)
        ->exists()) {
        return redirect()->back()->with('error', 'El correo electrónico ya está registrado por otro usuario. Por favor, elige otro.');
        }

        // Actualizar la información del usuario
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Solo actualizar la contraseña si se proporciona
        // Verifica si el correo pertenece a otro usuario


        $user->save();

        // Asignar el rol seleccionado al usuario
        $user->syncRoles([$validatedData['role']]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Eliminar Usuarios
    public function delete(User $user)
    {
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


    // Métodos para Servicio

    public function indexServicios()
    {
        $serviciosall = Servicio::all();
        $servicios = Servicio::paginate(4);
        return view('admin.servicios.index', compact('servicios', 'serviciosall'));
    }

    public function storeServicio(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'icono' => 'nullable|string',
            'costo' => 'nullable|numeric|between:0,999999.99',
            'descripcion' => 'nullable|string',
        ]);

        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->icono = $request->icono;
        $servicio->costo = $request->costo;
        $servicio->descripcion = $request->descripcion;
        $servicio->save();

        return redirect()->back()->with('success', 'Servicio creado exitosamente');
    }

      public function updateServicio(Request $request, $id)
      {
          $request->validate([
              'nombre' => 'required|string|max:255',
              'icono' => 'nullable|string',
              'costo' => 'nullable|numeric|between:0,999999.99',
              'descripcion' => 'nullable|string',
          ]);

          $servicio = Servicio::findOrFail($id);
          $servicio->update($request->all());

          return redirect()->back()->with('success', 'Servicio actualizado con éxito');
      }

      public function destroyServicio($id)
      {
          $servicio = Servicio::findOrFail($id);
          $servicio->delete();

          return redirect()->back()->with('success', 'Servicio eliminado con éxito');
      }

    // Métodos para Cobros

    public function indexCobros()
    {
        $cobrosall = Cobros::all();
        $cobros = Cobros::paginate(4);
        $servicios = servicio::all();
        return view('admin.cobros.index', compact('cobros', 'cobrosall','servicios'));
    }



}
