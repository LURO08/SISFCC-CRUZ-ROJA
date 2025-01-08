<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index()
    {
        $todosLosPacientes = Pacientes::all()->map(function($pacientes) {
            $pacientes->folio = $pacientes->getID();
            return $pacientes;
        });
        $pacientes = Pacientes::paginate(4);
        return view('doctor.pacientes.index', compact('pacientes','todosLosPacientes'));
    }

    public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellidopaterno' => 'required|string|max:255',
        'apellidomaterno' => 'required|string|max:255',
        'edad' => 'required|integer',
        'sexo' => 'required|string|in:Masculino,Femenino',
        'tipo_sangre' => 'required|string|max:3',
    ]);

    // Crear el registro en la base de datos
    Pacientes::create([
        'nombre' => $request->nombre,
        'apellidopaterno' => $request->apellidopaterno,
        'apellidomaterno' => $request->apellidomaterno,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'tipo_sangre' => $request->tipo_sangre,
    ]);

    // Redirigir con un mensaje de éxito
    return redirect()->route('doctor.pacientes.index')->with('success', 'Paciente registrado con éxito.');
}

    public function update(Request $request, $id)
    {
        $paciente = Pacientes::findOrFail($id);

        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidopaterno' => 'required|string|max:255',
            'apellidomaterno' => 'required|string|max:255',
            'edad' => 'required|integer',
            'sexo' => 'required|string|in:Masculino,Femenino',
            'tipo_sangre' => 'required|string|max:3',
        ]);

        // Actualizar los datos del paciente
        $paciente->update($request->all());

        return redirect()->route('doctor.pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy($id)
    {
        try {
            // Intenta encontrar el paciente por su ID o arroja una excepción si no se encuentra
            $paciente = Pacientes::findOrFail($id);

            // Mensaje de depuración: Intentando eliminar al paciente
            logger()->info('Intentando eliminar al paciente de la base de datos: ' . $paciente->id);

            // Elimina el paciente
            $paciente->delete();

            // Mensaje de depuración: Paciente eliminado
            logger()->info('Paciente eliminado correctamente: ' . $paciente->id);

            // Redirige a la lista de pacientes con un mensaje de éxito
            return redirect()->route('doctor.pacientes.index')->with('success', 'Paciente eliminado con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Maneja el caso en que el paciente no se encuentra
            logger()->error('Paciente no encontrado con ID: ' . $id);
            return redirect()->route('doctor.pacientes.index')->with('error', 'Paciente no encontrado.');
        } catch (\Exception $e) {
            // Captura cualquier otra excepción y muestra un mensaje de error
            logger()->error('Error al eliminar al paciente: ' . $e->getMessage());
            return redirect()->route('doctor.pacientes.index')->with('error', 'Error al eliminar al paciente: ' . $e->getMessage());
        }
    }



}
