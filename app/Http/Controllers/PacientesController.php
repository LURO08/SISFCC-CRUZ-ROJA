<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function index()
    {
        $pacientes = Pacientes::all();
        return view('doctor.pacientes.index', compact('pacientes'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidopaterno' => 'required|string|max:255',
            'apellidomaterno' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'sexo' => 'required|string|in:Masculino,Femenino',
            'tipo_sangre' => 'required|string|max:3',
        ]);

        // Creación del paciente en la base de datos
        Pacientes::create($request->all());

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
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|integer',
            'sexo' => 'required|string|in:Masculino,Femenino',
            'tipo_sangre' => 'required|string|max:3',
        ]);

        // Actualizar los datos del paciente
        $paciente->update($request->all());

        return redirect()->route('doctor.pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy(Pacientes $paciente)
    {
        // Mensaje de depuración: Paciente recibido
        logger()->info('Intentando eliminar al paciente: ' . $paciente->id);

        // Verifica que el paciente se ha encontrado correctamente
        if (!$paciente) {
            logger()->error('Paciente no encontrado: ' . $paciente->id);
            return redirect()->route('doctor.pacientes.index')->with('error', 'Paciente no encontrado.');
        }

        try {
            // Mensaje de depuración: Intentando eliminar al paciente
            logger()->info('Intentando eliminar al paciente de la base de datos: ' . $paciente->id);

            // Elimina el paciente
            $paciente->delete();

            // Mensaje de depuración: Paciente eliminado
            logger()->info('Paciente eliminado correctamente: ' . $paciente->id);

            // Redirige a la lista de pacientes con un mensaje de éxito
            return redirect()->route('doctor.pacientes.index')->with('success', 'Paciente eliminado con éxito.');
        } catch (\Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error
            logger()->error('Error al eliminar al paciente: ' . $e->getMessage());
            return redirect()->route('doctor.pacientes.index')->with('error', 'Error al eliminar al paciente: ' . $e->getMessage());
        }
    }
}
