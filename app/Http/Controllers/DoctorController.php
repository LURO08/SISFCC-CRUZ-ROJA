<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\RecetaMedica;
use App\Models\ExpedienteMedico;
use App\Models\Doctores;
use App\Models\Transaccion;
Use App\Models\Personal;
Use App\Models\Medicamentos;
Use App\Models\InventarioMedico;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;

class DoctorController extends Controller
{
    // Muestra la vista principal del módulo de doctor con las recetas, pacientes y doctores
    public function index()
    {
        $recetas = RecetaMedica::all();
        $pacientes = Pacientes::all();
        $ExpedienteMedico = ExpedienteMedico::all();
        $medicamentos = Medicamentos::all();
        $inventarioMedico = InventarioMedico::all();

        return view('doctor.index', compact('inventarioMedico','medicamentos', 'pacientes', 'recetas','ExpedienteMedico'));
    }

    public function indexReceta()
    {

        if (session()->has('pdf_generated')) {
            return redirect()->route('doctor.index')->with('success', 'Se creo correctamente la receta.');
        }
        $recetas = RecetaMedica::all();
        $pacientes = Pacientes::all();
        $medicamentos = Medicamentos::all();
        $inventarioMedico = InventarioMedico::all();

        return view('doctor.consulta.index', compact('inventarioMedico','medicamentos', 'pacientes', 'recetas'));
    }

    // Almacena una nueva receta médica en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'selectedPatientId' => 'required|integer', // Validar que el paciente seleccionado exista
            'selectedPatient' => 'required|string|max:255', // Descripción del paciente
            'presion_arterial' => 'required|string|max:255',
            'temperatura' => 'required',
            'talla' => 'required',
            'peso' => 'required',
            'alergia' => 'nullable', // Puede ser opcional
            'frecuencia_cardiaca' => 'required',
            'frecuencia_respiratoria' => 'required',
            'saturacion_oxigeno' => 'required',
            'diagnostico' => 'required|string',
            'tratamiento' => 'nullable|string',
            'enviar_farmacia' => 'nullable|boolean', // Este campo es opcional
            'enviar_caja' => 'required|boolean', // Este es obligatorio aunque no visible en el formulario
            'material' => 'nullable|string',
        ]);

        $userid = auth()->user()->id;
        $personal = Personal::where('user_id', $userid)->first();
        if (!$personal) {
            return redirect()->back()->with('error', 'No se encontró el personal asociado al usuario.');
        }

        $doctor = Doctores::where('personalid', $personal->id)->first();
        if (!$doctor) {
            return redirect()->back()->with('error', 'No se encontró el doctor asociado al usuario.');
        }

        // Establecer la zona horaria
        date_default_timezone_set('America/Mexico_City');

        // Crear la receta médica
        $recetaMedica = RecetaMedica::create([
            'doctor_id' => $doctor->id,
            'paciente_id' => $request->input('selectedPatientId'), // ID del paciente seleccionado
            'nombre_paciente' => $request->input('selectedPatient'), // Asegúrate de que este campo esté bien definido
            'presion_arterial' => $request->input('presion_arterial'),
            'temperatura' => $request->input('temperatura'),
            'talla' => $request->input('talla'),
            'peso' => $request->input('peso'),
            'alergia' => $request->input('alergia'), // Puede ser nulo
            'frecuencia_cardiaca' => $request->input('frecuencia_cardiaca'),
            'frecuencia_respiratoria' => $request->input('frecuencia_respiratoria'),
            'saturacion_oxigeno' => $request->input('saturacion_oxigeno'),
            'diagnostico' => $request->input('diagnostico'),
            'tratamiento' => $request->input('tratamiento'),
            'material' => $request->input('material'),
        ]);

        // Guardar en expediente médico
        ExpedienteMedico::create([
            'doctor_id' => $doctor->id,
            'paciente_id' => $request->input('selectedPatientId'), // ID del paciente seleccionado
            'diagnostico' => $request->input('diagnostico'),
            'tratamiento' => $request->input('tratamiento'),
            'receta_id' => $recetaMedica->id,
        ]);

        // Registrar el envío obligatorio a Caja de Cobro
        Transaccion::create([
            'receta_medica_id' => $recetaMedica->id,
            'destino' => 'caja', // Obligatorio
        ]);

        // Registrar opcionalmente el envío a Farmacia
        if ($request->has('enviar_farmacia') && $request->enviar_farmacia == 1) {
            Transaccion::create([
                'receta_medica_id' => $recetaMedica->id,
                'destino' => 'farmacia',
            ]);
        }

        $receta = RecetaMedica::findOrFail($recetaMedica->id);
        $doctor = $receta->doctor;
        $paciente = $receta->paciente;
        // Controlador
        $medicamentosArray = explode("\n", $receta->tratamiento); // Divide la cadena por saltos de línea
        $medicamentosArray = array_map('trim', $medicamentosArray); // Elimina espacios extra
        $medicamentosArray = array_map(function($medicamento) {
            return str_replace(['-', ','], '', $medicamento); // Elimina guiones y comas
        }, $medicamentosArray);
        session()->flash('pdf_generated', true);
        $data = compact('receta', 'doctor', 'paciente','medicamentosArray');


        // Generar el PDF
        $pdf = Pdf::loadView('pdf.receta', $data);

        return $pdf->stream('receta_' . $receta->id . '.pdf'); // Cambia el nombre del archivo según tus necesidades
    }


    public function editarReceta($id){

        $recetas = RecetaMedica::where('id', $id)->first();
        $pacientes = Pacientes::where('id', $recetas->paciente_id)->first();
        $medicamentos = Medicamentos::all();
        $inventarioMedico = InventarioMedico::all();
        $transacciones = Transaccion::where('receta_medica_id', $id)->get();


        return view('doctor.consulta.receta_editar.index', compact('inventarioMedico','medicamentos', 'pacientes', 'recetas','transacciones'));
    }

    public function ViewRecetas()
    {
        $recetas = RecetaMedica::all();
        $recetasPaginadas = RecetaMedica::paginate(2);
        $pacientes = Pacientes::all();
        $ExpedienteMedico = ExpedienteMedico::all();
        $medicamentos = Medicamentos::all();
        $inventarioMedico = InventarioMedico::all();

        return view('doctor.recetas.index', compact('recetasPaginadas','inventarioMedico','medicamentos', 'pacientes', 'recetas','ExpedienteMedico'));
    }


    // Actualiza una receta médica existente
    public function update(Request $request, int $id)
    {
        // Validación
        $request->validate([
            'presion_arterial' => 'required|string|max:255',
            'temperatura' => 'required',
            'talla' => 'required',
            'peso' => 'required',
            'alergia' => 'nullable', // Puede ser opcional
            'frecuencia_cardiaca' => 'required',
            'frecuencia_respiratoria' => 'required',
            'saturacion_oxigeno' => 'required ',
            'diagnostico' => 'required|string',
            'tratamiento' => 'nullable|string',
            'material'  =>  'nullable|string',
        ]);

        // Buscar la receta
        $receta = RecetaMedica::findOrFail($id);

        // Actualizar la receta
        $receta->update([
            'presion_arterial' => $request->input('presion_arterial'),
            'temperatura' => $request->input('temperatura'),
            'talla' => $request->input('talla'),
            'peso' => $request->input('peso'),
            'alergia' => $request->input('alergia'), // Puede ser nulo
            'frecuencia_cardiaca' => $request->input('frecuencia_cardiaca'),
            'frecuencia_respiratoria' => $request->input('frecuencia_respiratoria'),
            'saturacion_oxigeno' => $request->input('saturacion_oxigeno'),
            'diagnostico' => $request->input('diagnostico'),
            'tratamiento' => $request->input('tratamiento'),

        ]);

        // Buscar el expediente médico asociado
        $expediente = ExpedienteMedico::where('paciente_id', $receta->paciente_id)
        ->firstOrFail();

        // Actualizar el expediente médico
        $expediente->update([
        'diagnostico' => $request->input('diagnostico'),
        'tratamiento' => $request->input('tratamiento'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('doctor.index')->with('success', 'Receta médica actualizada exitosamente.');
    }

    // Elimina una receta médica de la base de datos
    public function destroy(int $id)
    {
        $receta = RecetaMedica::findOrFail($id);
        $receta->delete();

        return redirect()->route('doctor.index')->with('success', 'Receta médica eliminada exitosamente.');
    }

    public function descargarReceta($id)
    {
            $receta = RecetaMedica::findOrFail($id);
            $doctor = $receta->doctor;
            $paciente = $receta->paciente;
            // Controlador
            $medicamentosArray = explode("\n", $receta->tratamiento); // Divide la cadena por saltos de línea
            $medicamentosArray = array_map('trim', $medicamentosArray); // Elimina espacios extra
            $medicamentosArray = array_map(function($medicamento) {
                return str_replace(['-', ','], '', $medicamento); // Elimina guiones y comas
            }, $medicamentosArray);

            $data = compact('receta', 'doctor', 'paciente','medicamentosArray');

            // Generar el PDF
            $pdf = Pdf::loadView('pdf.receta', $data);

            return $pdf->stream('receta_' . $receta->id . '.pdf'); // Cambia el nombre del archivo según tus necesidades
    }

    public function recetaView(int $id)
    {
        $receta = RecetaMedica::findOrFail($id);

        // Buscar al doctor y paciente correspondientes
        $doctor = $receta->doctor;
        $paciente = $receta->paciente;

        // Convertir la imagen a base64
        $path = public_path('img/logosvg.png'); // Ruta de la imagen
        $imageData = base64_encode(file_get_contents($path)); // Codificar la imagen a base64
        $src = 'data:image/png;base64,' . $imageData; // Crear la cadena de datos

        return view('pdf.receta', compact('receta', 'doctor', 'paciente', 'src'));
    }






}
