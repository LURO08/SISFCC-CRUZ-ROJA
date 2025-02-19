<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Doctores;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PersonalController extends Controller
{
    public function index()
    {
        $doctores = Doctores::all();
        $usuarios = User::all();
        $personals = Personal::paginate(2);

        $personalsall = Personal::all()->map(function($Personal) {
            $Personal->eliminarruta = route('admin.personals.destroy', $Personal->id);
            return $Personal;
        });

    return view('admin.personal.index', compact('personals', 'doctores','usuarios','personalsall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validar los datos del formulario
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'Edad' => 'required|integer|min:18',
            'Sexo' => 'required|string|in:Masculino,Femenino',
            'FechaNacimiento' => 'required|date',
            'Cargo' => 'required|string|max:255',
            'Turno' => 'required|string|max:255',
            'Horario' => 'required|string|max:255',
            'Telefono' => 'required|max:10',
            'Direccion' => 'required|string|max:255',
            'cedulaProfesional' => 'nullable|string|max:255',
            'rutafirma' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Determinar el departamento según el cargo
        $departamento = $this->determinarDepartamento($request->Cargo);

        // Crear el nuevo registro
        $personal = Personal::create(array_merge($request->all(), ['Departamento' => $departamento]));

        if ($request->Cargo == 'doctor') {

            // Procesamiento de la imagen
           if ($request->hasFile('rutafirma')) {
               $nombreImagen = time() . '_' . $request->file('rutafirma')->getClientOriginalName();
               $rutaImagen = 'images/doctores/firmas/' . $nombreImagen;
               $request->file('rutafirma')->move(public_path('images/doctores/firmas/'), $nombreImagen);
           } else {
               $rutaImagen = 'images/doctores/firmas/default.png'; // Imagen por defecto si no se proporciona una
           }

           Doctores::create([
               'personalid' => $personal->id,
               'cedulaProfesional' => $request->cedulaProfesional,
               'rutafirma' => $rutaImagen,
           ]);
       }

        // Retornar a la vista de lista con un mensaje de éxito
        return redirect()->route('admin.personal.index')->with('success', 'Personal creado con éxito.');
    }


    public function storePersonal(Request $request)
    {

        // Validar los datos del formulario
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'Edad' => 'required|integer|min:18',
            'Sexo' => 'required|string|in:Masculino,Femenino',
            'FechaNacimiento' => 'required|date',
            'Cargo' => 'required|string|max:255',
            'Turno' => 'required|string|max:255',
            'Telefono' => 'required|max:10',
            'Direccion' => 'required|string|max:255',
            'cedulaProfesional' => 'nullable|string|max:255',
            'rutafirma' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Determinar el departamento según el cargo
        $departamento = $this->determinarDepartamento($request->Cargo);

        // Crear el nuevo registro
        $personal = Personal::create(array_merge($request->all(), ['Departamento' => $departamento]));

        if ($request->Cargo == 'doctor') {

            // Procesamiento de la imagen
           if ($request->hasFile('rutafirma')) {
               $nombreImagen = time() . '_' . $request->file('rutafirma')->getClientOriginalName();
               $rutaImagen = 'images/doctores/firmas/' . $nombreImagen;
               $request->file('rutafirma')->move(public_path('images/doctores/firmas/'), $nombreImagen);
           }

           Doctores::create([
               'personalid' => $personal->id,
               'cedulaProfesional' => $request->cedulaProfesional,
               'rutafirma' => $rutaImagen,
           ]);
       }

        // Retornar a la vista de lista con un mensaje de éxito
        return redirect()->back()->with('success', 'Personal creado con éxito.');
    }

    public function update(Request $request, $id)
    {

        $personal = Personal::findOrFail($id);
        $doctor = Doctores::where('personalid', $id)->first();
        // Validar los datos actualizados
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'Edad' => 'required|integer|min:18',
            'Sexo' => 'required|string|in:Masculino,Femenino',
            'FechaNacimiento' => 'required|date',
            'Cargo' => 'required|string|max:255',
            'Turno' => 'required|string|max:255',
            'Telefono' => 'required|max:10',
            'Direccion' => 'required|string|max:255',
            'cedulaProfesional' => 'nullable|string|max:255',
            'rutafima' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Determinar el departamento según el cargo
        $departamento = $this->determinarDepartamento($request->Cargo);

        // Actualizar el registro en la base de datos
        $personal->update(array_merge($request->all(), ['Departamento' => $departamento]));


        if ($request->Cargo == 'doctor') {

            $rutaImagen = $doctor->rutafirma;

            // Procesamiento de la imagen
           if ($request->hasFile('rutafirma')) {
               $nombreImagen = time() . '_' . $request->file('rutafirma')->getClientOriginalName();
               $rutaImagen = 'images/doctores/firmas/' . $nombreImagen;
               $request->file('rutafirma')->move(public_path('images/doctores/firmas/'), $nombreImagen);
           }

           $doctor->cedulaProfesional = $request->cedulaProfesional;
           $doctor->rutafirma = $rutaImagen;

           $doctor->save();
       }


        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Personal actualizado con éxito.');
    }


    public function updatePersonal(Request $request, $id)
    {

        $personal = Personal::findOrFail($id);
        $doctor = Doctores::where('personalid', $personal->id)->first();
        // Validar los datos actualizados
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'Edad' => 'required|integer|min:18',
            'Sexo' => 'required|string|in:Masculino,Femenino',
            'FechaNacimiento' => 'required|date',
            'Cargo' => 'required|string|max:255',
            'Turno' => 'required|string|max:255',
            'Horario' => 'required|string|max:255',
            'Telefono' => 'required|max:10',
            'Direccion' => 'required|string|max:255',
            'cedulaProfesional' => 'nullable|string|max:255',
            'rutafirma' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Determinar el departamento según el cargo
        $departamento = $this->determinarDepartamento($request->Cargo);

        // Actualizar el registro en la base de datos
        $personal->update(array_merge($request->all(), ['Departamento' => $departamento]));


        if ($request->Cargo == 'doctor') {

            // Procesamiento de la imagen
        if ($request->hasFile('rutafirma')) {
            $nombreImagen = time() . '_' . $request->file('rutafirma')->getClientOriginalName();
            $rutaImagen = 'images/doctores/firmas/' . $nombreImagen;
            $request->file('rutafirma')->move(public_path('images/doctores/firmas/'), $nombreImagen);
        } else {
            $rutaImagen = 'images/doctores/firmas/default.png'; // Imagen por defecto si no se proporciona una
        }

        $doctor->update([
            'personalid' => $personal->id,
            'cedulaProfesional' => $request->cedulaProfesional,
            'rutafirma' => $rutaImagen,
        ]);
        }

        return redirect()->back()->with('success', 'Personal actualizado con éxito.');
    }

    /**
     * Determinar el departamento según el cargo.
     */
    private function determinarDepartamento($cargo)
    {
        switch ($cargo) {
            case 'doctor':
            case 'enfermera':
                return 'Consultorio';
            case 'chofer':
            case 'paramédico':
                return 'Ambulancias';
            case 'recepcionista':
                return 'CE-COM';
            case 'farmaceutico':
                return 'Farmacia';
            case 'cajero':
                return 'Caja de Cobro';
            default:
                return null; // O puedes manejar esto de otra manera
        }
    }

    public function destroy($id)
    {
        $personal = Personal::findOrFail($id);
        // Eliminar el registro
        $personal->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Personal eliminado con éxito.');
    }

    public function destroyPersonal($id)
    {
        $personal = Personal::findOrFail($id);
        // Eliminar el registro
        $personal->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Personal eliminado con éxito.');
    }

    public function generarReporte()
    {
        $doctores = Doctores::with('Personal')->get();
        $personal = Personal::all();
        $pdf = PDF::loadView('reportes.ReportePersonal', compact('doctores', 'personal'));
        // return $pdf->download('reporte_Personal.pdf');
        return $pdf->stream('reporte_Personal.pdf');

        // Si decides usar Excel
        // return Excel::download(new ReportePersonalYDoctoresExport($doctores, $personals), 'reporte_completo.xlsx');
    }


    public function GuardiasIndex(){

        return view('admin.guardia.index');
    }

    public function descargarformato(Request $request){
        $dias = $request->dias;
        $data = compact('dias');
        $pdf = PDF::loadView('pdf.guardia_formato',$data );
        // return $pdf->download('reporte_Personal.pdf');
        return $pdf->stream('formato_guardias.pdf');
    }
}
