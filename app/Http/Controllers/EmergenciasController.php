<?php

namespace App\Http\Controllers;

use App\Models\Emergencias;
use Illuminate\Http\Request;
use App\Models\AmbulanceService;
use App\Models\InventarioVehiculos;
use App\Models\Personal;
use App\Models\EmergencyPhase1;
use App\Models\EmergencyPhase2;
use App\Models\EmergencyPhase3;
use App\Models\EmergencyPhase4;
use App\Models\EmergencyPhase5;
use App\Models\EmergencyPhase6;
use App\Models\EmergencyPhase7;
use App\Models\EmergencyPhase8;
use App\Models\EmergencyPhase8_Zonas;
use App\Models\EmergencyPhase9;
use PDF;
use Dompdf\Options;

class EmergenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $helicopteros = InventarioVehiculos::helicopteros()->get();
        $ambulances = InventarioVehiculos::ambulancias()->get();
        $ambulanceServices = AmbulanceService::all();
        $phases = EmergencyPhase2::with(['ambulance', 'chofer', 'paramedico', 'helicoptero'])->get();
        $personal = Personal::all();
        return view('socorro.emergencias.index', compact('phases','ambulanceServices','ambulances','personal','helicopteros'));
    }

    public function indexAmbulancesServices(){
        $ambulances = InventarioVehiculos::ambulancias()->get();
        $ambulanceServices = AmbulanceService::all();

        return view('socorro.ambulances_services.index', compact('ambulanceServices','ambulances'));
    }

    public function storeAmbulanceServices(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'ambulance_id' => 'required|exists:inventario_vehiculos,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
            'status' => 'required|in:En servicio,Finalizado',
        ]);

        // Verificar si la ambulancia ya está en servicio
        $existingService = AmbulanceService::where('ambulance_id', $validatedData['ambulance_id'])
            ->where('status', 'En servicio')
            ->first();

        if ($existingService) {
            return redirect()->route('socorros.index')->with('error', 'Esta ambulancia ya está en servicio.');
        }

        // Crear el servicio
        AmbulanceService::create($validatedData);

        return redirect()->back()->with('success', 'Servicio de ambulancia creado con éxito.');
    }

    public function endService($id)
    {
        // Buscar el servicio de ambulancia por ID
        $service = AmbulanceService::findOrFail($id);

        // Verificar que el servicio esté en estado "En servicio"
        if ($service->status !== 'En servicio') {
            return redirect()->route('Jefe de Socorros.index')->with('error', 'El servicio ya ha sido finalizado.');
        }

        // Actualizar el estado y la hora de finalización
        $service->update([
            'status' => 'Finalizado',
            'end_time' => now(), // Establece la hora actual como hora de finalización
        ]);

        return redirect()->back()->with('success', 'El servicio de ambulancia ha sido finalizado con éxito.');
    }

    public function registerEmergency(){
        $helicopteros = InventarioVehiculos::helicopteros()->get();
        $ambulances = InventarioVehiculos::ambulancias()->get();
        $ambulanceServices = AmbulanceService::all();
        $phases = EmergencyPhase2::with(['ambulance', 'chofer', 'paramedico', 'helicoptero'])->get();
        $personal = Personal::all();
        return view('socorro.emergencias.register', compact('phases','ambulanceServices','ambulances','personal','helicopteros'));
    }


    public function editarEmergency( $id){
        $helicopteros = InventarioVehiculos::helicopteros()->get();
        $ambulances = InventarioVehiculos::ambulancias()->get();
        $ambulanceServices = AmbulanceService::all();

        $phase1 = EmergencyPhase1::findOrFail($id);
        $phase2 = EmergencyPhase2::where('folio', $id)->first();
        $phase3 = EmergencyPhase3::where('folio', $id)->first();
        $phase4 = EmergencyPhase4::where('folio', $id)->first();
        $phase5 = EmergencyPhase5::where('folio', $id)->first();
        $phase6 = EmergencyPhase6::where('folio', $id)->first();
        $phase7 = EmergencyPhase7::where('folio', $id)->first();
        $ventilacion_hemitorax = json_decode($phase7->ventilacion_hemitorax,true);
        $ventilacion_sitio = json_decode($phase7->ventilacion_sitio,true);
        $circulacion_calidad = json_decode($phase7->circulacion_calidad,true);

        $phase8 = EmergencyPhase8::where('folio', $id)->first();
        $phase8_zona = EmergencyPhase8_Zonas::where('folio', $id)->first();
        $exploracionFisica = json_decode($phase8->exploracion_fisica,true);
        $zonaslesion = json_decode($phase8_zona->zona,true);
        $Coordenadaslesion = json_decode($phase8_zona->coordinate,true);


        $phase9 = EmergencyPhase9::where('folio', $id)->first();
        $hemitorax = json_decode($phase9->hemitorax,true);
        $oxigenoterapia = json_decode($phase9->oxigenoterapia,true);
        $vias_venosas = json_decode($phase9->vias_venosas,true);
        $tipo_soluciones = json_decode($phase9->tipo_soluciones,true);
        $soluciones = json_decode($phase9->soluciones,true);
        $rcp_procedimientos = json_decode($phase9->rcp_procedimientos,true);
        $medicamentos_terapia = json_decode($phase9->medicamentos_terapia,true);
        $personal = Personal::all();
        return view('socorro.emergencias.editar', compact(
            'phase1',
            'phase2',
            'phase3',
            'phase4',
            'phase5',
            'phase6',
            'phase7',
            'ventilacion_hemitorax',
            'ventilacion_sitio',
            'circulacion_calidad',

            'phase8',
            'exploracionFisica',
            'phase8_zona',

            'phase9',
            'hemitorax',
            'oxigenoterapia',
            'vias_venosas',
            'tipo_soluciones',
            'soluciones',
            'rcp_procedimientos',
            'medicamentos_terapia',
            'ambulanceServices',
            'ambulances',
            'personal',
            'helicopteros'));
    }

    public function emergencyStore(Request $request)
    {
        //Fase 1
        $validatedPhase1 = $request->validate([
            'hora_llamada' => 'nullable|date_format:H:i',
            'hora_despacho' => 'nullable|date_format:H:i',
            'hora_arribo' => 'nullable|date_format:H:i',
            'hora_traslado' => 'nullable|date_format:H:i',
            'hora_hospital' => 'nullable|date_format:H:i',
            'hora_disponible' => 'nullable|date_format:H:i',
            'motivo_atencion' => 'nullable|string',
            'direccion_accidente' => 'nullable|string|max:255',
            'entre_calles_accidente' => 'nullable|string|max:255',
            'colonia_accidente' => 'nullable|string|max:255',
            'municipio_accidente' => 'nullable|string|max:255',
            'lugar_ocurrencia' => 'nullable|string',
            'otro_lugar' => 'nullable|string|max:255'
        ]);
        // //Fase 2
        // $validatedPhase2 = $request->validate([
        //     'ambulance_id' => 'nullable|exists:ambulances,id',
        //     'chofer_id' => 'nullable|exists:personal,id',
        //     'paramedico_id' => 'nullable|exists:personal,id',
        //     'helicoptero_id' => 'nullable|exists:helicopteros,id'
        // ]);
        // //Fase 3
        // $validatedPhase3 = $request->validate([
        //     // Validaciones para los campos de la fase 3
        //     'nombre' => 'nullable|string|max:255',
        //     'apellido_paterno' => 'nullable|string|max:255',
        //     'apellido_materno' => 'nullable|string|max:255',
        //     'edad' => 'nullable|integer|min:0',
        //     'meses' => 'nullable|integer|min:0|max:11',
        //     'sexo' => 'nullable|in:masculino,femenino,otro',
        //     'tipo_sangre' => 'nullable|string|max:10',
        //     'domicilio' => 'nullable|string|max:255',
        //     'colonia' => 'nullable|string|max:255',
        //     'alcaldia' => 'nullable|string|max:255',
        //     'telefono' => 'nullable|string|max:20',
        //     'ocupacion' => 'nullable|string|max:255',
        //     'derechohabiente' => 'nullable|string|max:255',
        //     'compania_seguro' => 'nullable|string|max:255'
        // ]);
        // //Fase 4
        // $validatedPhase4 = $request->validate([
        //     'agente_causal' => 'nullable|string|max:255',
        //     'especificar' => 'nullable|string|max:255',
        //     'lesionescausadas' => 'nullable|string|max:255',
        //     'tipo_accidente' => 'nullable|string|max:255',
        //     'atropelladopor' => 'nullable|string|max:255',
        //     'colision' => 'nullable|string|max:255',
        //     'contraobjeto' => 'nullable|string|max:255',
        //     'impacto' => 'nullable|string|max:255',
        //     'hundimiento' => 'nullable|integer',
        //     'parabrisas' => 'nullable|string|max:255',
        //     'volante' => 'nullable|string|max:255',
        //     'bolsaaire' => 'nullable|string|max:255',
        //     'cinturon' => 'nullable|string|max:255',
        //     'dentrovehiculo' => 'nullable|string|max:255'
        // ]);
        // //Fase 5
        // $validatedPhase5 = $request->validate([
        //     'agente_causal' => 'nullable|string|max:255',
        //     'especificar' => 'nullable|string|max:255',
        //     'lesionescausadas' => 'nullable|string|max:255',
        //     'tipo_accidente' => 'nullable|string|max:255',
        //     'atropelladopor' => 'nullable|string|max:255',
        //     'colision' => 'nullable|string|max:255',
        //     'contraobjeto' => 'nullable|string|max:255',
        //     'impacto' => 'nullable|string|max:255',
        //     'hundimiento' => 'nullable|integer',
        //     'parabrisas' => 'nullable|string|max:255',
        //     'volante' => 'nullable|string|max:255',
        //     'bolsaaire' => 'nullable|string|max:255',
        //     'cinturon' => 'nullable|string|max:255',
        //     'dentrovehiculo' => 'nullable|string|max:255',
        //     'origen_probable' => 'nullable|string|max:255',
        //     'especificarOrigen' => 'nullable|string|max:255',
        //     'primeravez' => 'nullable|string|max:255',
        //     'subsecuente' => 'nullable|string|max:255'
        // ]);
        // //Fase 6
        // $validatedPhase6 = $request->validate([
        //     // Datos de la madre
        //     'gesta' => 'nullable|string|max:255',
        //     'cesareas' => 'nullable|string|max:255',
        //     'para' => 'nullable|string|max:255',
        //     'aborto' => 'nullable|string|max:255',
        //     'semanas' => 'nullable|string|max:255',
        //     'fechaParto' => 'nullable|date',
        //     'membranas' => 'nullable|string|max:255',
        //     'fum' => 'nullable|date',
        //     'horaContracciones' => 'nullable|date_format:H:i',
        //     'frecuencia' => 'nullable|string|max:255',
        //     'duracion' => 'nullable|string|max:255',

        //     // Datos post-parto
        //     'horanacimiento' => 'nullable|date_format:H:i',
        //     'lugar_post_parto' => 'nullable|string|max:255',
        //     'placenta_expulsada' => 'nullable|string|max:255',

        //     // Datos del recién nacido
        //     'estado_producto' => 'nullable|string|in:vivo,muerto',
        //     'genero_producto' => 'nullable|string|in:masculino,femenino',
        //     'apgar1' => 'nullable|integer|min:0|max:10',
        //     'apgar5' => 'nullable|integer|min:0|max:10'
        // ]);
        // //Fase 7
        // $validatedPhase7 = $request->validate([
        //     'paciente_id' => 'nullable|exists:validatedPhase3,id',
        //     'nivel_conciencia' => 'nullable|string',
        //     'via_aerea' => 'nullable|string',
        //     'reflejo_deglutacion' => 'nullable|string',
        //     'ventilacion_observacion' => 'nullable|string',
        //     'ventilacion_auscultacion' => 'nullable|string',
        //     'ventilacion_hemitorax' => 'nullable|string',
        //     'ventilacion_sitio' => 'nullable|string',
        //     'circulacion_pulsos' => 'nullable|string',
        //     'circulacion_calidad' => 'nullable|string',
        //     'circulacion_piel' => 'nullable|string',
        //     'circulacion_caracteristicas' => 'nullable|string'
        // ]);
        // //Fase 8
        // $validatedPhase8 = $request->validate([
        //     'exploracion_fisica' => 'nullable|array',  // Validar que el array no esté vacío
        //     'exploracion_fisica.*' => 'string',  // Cada valor dentro del array debe ser un string
        //     'ojos' => 'nullable|array', // Array con los valores seleccionados
        //     'ojos.*' => 'integer|min:1|max:5', // Cada valor debe ser un número entre 1 y 4
        //     'hora' => 'nullable|date_format:H:i:s',
        //     'fr' => 'nullable|numeric|min:0',
        //     'fc' => 'nullable|numeric|min:0',
        //     'tas' => 'nullable|numeric|min:0',
        //     'tad' => 'nullable|numeric|min:0',
        //     'spo2' => 'nullable|numeric|min:0',
        //     'temp' => 'nullable|numeric|min:0',
        //     'glasgow' => 'nullable|numeric|min:0',
        //     'trauma_score' => 'nullable|numeric|min:0',
        //     'ekg' => 'nullable|numeric|min:0',
        //         'atendido' => 'nullable|boolean',
        //         'alergias' => 'nullable|string',
        //         'medicamentos' => 'nullable|string',
        //         'antecedentes' => 'nullable|string',
        //         'ultima_comida' => 'nullable|string',
        //         'eventos_previos' => 'nullable|string',
        //         'condicion' => 'nullable|string',
        //         'prioridad' => 'nullable|string'
        // ]);

        // $validatedPhase8Zonas = $request->validate([
        //     'zonaslabel' => 'nullable|array',  // Validar que el array no esté vacío
        //     'coordinate' => 'nullable|array',  // Cada valor dentro del array debe ser un string
        // ]);

        // Lista de descripciones y abreviaturas para insertar
        $exploraciones = [
            ['descripcion' => 'Deformidades', 'abreviatura' => 'D'],
            ['descripcion' => 'Contusiones', 'abreviatura' => 'CD'],
            ['descripcion' => 'Penetraciones', 'abreviatura' => 'P'],
            ['descripcion' => 'Movimiento Paradójico', 'abreviatura' => 'MP'],
            ['descripcion' => 'Crepitación', 'abreviatura' => 'C'],
            ['descripcion' => 'Heridas', 'abreviatura' => 'H'],
            ['descripcion' => 'Fracturas', 'abreviatura' => 'F'],
            ['descripcion' => 'Enfisema Subcutáneo', 'abreviatura' => 'ES'],
            ['descripcion' => 'Quemaduras', 'abreviatura' => 'Q'],
            ['descripcion' => 'Laceraciones', 'abreviatura' => 'L'],
            ['descripcion' => 'Edema', 'abreviatura' => 'E'],
            ['descripcion' => 'Alteración de Sensibilidad', 'abreviatura' => 'AS'],
            ['descripcion' => 'Alteración de Movilidad', 'abreviatura' => 'AM'],
            ['descripcion' => 'Dolor', 'abreviatura' => 'DO'],
            ['descripcion' => 'Amputación', 'abreviatura' => 'AP'],
        ];
        // //Fase 9
        // $validatedPhase9 = $request->validate([
        //     'via_aerea' => 'nullable|array',
        //     'via_aerea.*' => 'string', // Validar que cada opción seleccionada sea una cadena
        //     'control_cervical' => 'nullable|string|in:manual,collarin_rigido,collarin_blando',
        //     // Asistencia Ventilatoria
        //     'asistencia_ventilatoria' => 'nullable|array',
        //     'asistencia_ventilatoria.*' => 'string',
        //     'frecuencia' => 'nullable|string',
        //     'volumen' => 'nullable|string',
        //     // Oxigenoterapia
        //     'oxigenoterapia' => 'nullable|array',
        //     'oxigenoterapia.*' => 'string',
        //     'litros' => 'nullable|string',
        //     // Procedimientos adicionales
        //     'procedimientos_adicionales' => 'nullable|array',
        //     'procedimientos_adicionales.*' => 'string',

        //     // Control de Hemorragias
        //     'control_hemorragias' => 'nullable|array',
        //     'control_hemorragias.*' => 'string',

        //     // Vías Venosas
        //     'vias_venosas' => 'nullable|array',
        //     'vias_venosas.linea_iv' => 'nullable|string',
        //     'vias_venosas.cateter' => 'nullable|string',

        //     // Sitio de Aplicación
        //     'sitio_aplicacion' => 'nullable|string',

        //     // Tipos de Soluciones
        //     'tipo_soluciones' => 'nullable|array',
        //     'tipo_soluciones.*' => 'string',
        //     'soluciones' => 'nullable|array',
        //     'soluciones.especifique' => 'nullable|string',
        //     'soluciones.cantidad' => 'nullable|string',
        //     'soluciones.infusiones' => 'nullable|string',

        //     'medicamentos_terapia' => 'nullable|array',
        //     'medicamentos_terapia.*.hora' => 'nullable|date_format:H:i',
        //     'medicamentos_terapia.*.medicamento' => 'nullable|string',
        //     'medicamentos_terapia.*.dosis' => 'nullable|string',
        //     'medicamentos_terapia.*.via_administracion' => 'nullable|string',
        //     'medicamentos_terapia.*.terapia_electrica' => 'nullable|string',

        //     'rcp_procedimientos' => 'nullable|array',
        //     'rcp_procedimientos.*' => 'nullable|string',
        // ]);


        $phase1 = EmergencyPhase1::create($validatedPhase1);
        $request['folio'] = $phase1->id;
        EmergencyPhase2::create($request->all());

        EmergencyPhase3::create($request->all());

        EmergencyPhase4::create($request->all());

        EmergencyPhase5::create($request->all());

        EmergencyPhase6::create($request->all());

        EmergencyPhase7::create(
        [
            'folio' => $phase1->id,
            'nivel_conciencia' => $request['nivel_conciencia'],
            'viaaerea' => $request['viaaerea'],
            'reflejo_deglutacion' => $request['reflejo_deglutacion'],
            'ventilacion_observacion' => $request['ventilacion_observacion'],
            'ventilacion_auscultacion' => $request['ventilacion_auscultacion'],

            'ventilacion_hemitorax' => json_encode($request['ventilacion_hemitorax']),
            'ventilacion_sitio' => json_encode($request['ventilacion_sitio']),
            'circulacion_pulsos' => $request['circulacion_pulsos'],
            'circulacion_calidad' => json_encode($request['circulacion_calidad']),
            'circulacion_piel' => $request['circulacion_piel'],
            'circulacion_caracteristicas' => $request['circulacion_caracteristicas'],

        ]);

        $validatedData = $request->validate([
            'exploracion_fisica' => 'nullable|array'
        ]);

        $phase8 = new EmergencyPhase8();
        $phase8 = EmergencyPhase8::create([
            // Exploración
            'folio' => $phase1->id,
            'exploracion_fisica' => isset($validatedData['exploracion_fisica'])
                    ? json_encode($validatedData['exploracion_fisica'])
                    : null, // Convertir a JSON si está presente
            'valor' => $request['ojos'],

            // Signos Vitales
            'hora_es' => $request['hora_es'],
            'fr' => $request['fr'],
            'fc' => $request['fc'],
            'tas' => $request['tas'],
            'tad' => $request['tad'],
            'spo2' => $request['spo2'],
            'temp' => $request['temp'],
            'glasgow' => $request['glasgow'],
            'trauma_score' => $request['trauma_score'],
            'ekg' => $request['ekg'],

            // Interrogatorio
            'atendido' => $request['atendido'],
            'alergias' => $request['alergias'],
            'medicamentos' => $request['medicamentos'],
            'antecedentes' => $request['antecedentes'],
            'ultima_comida' => $request['ultima_comida'],
            'eventos_previos' => $request['eventos_previos'],
            'condicion' => $request['condicion'],
            'estabilidad' => $request['estabilidad'],
            'prioridad' => $request['prioridad'],
        ]);

        $imageData = $request->input('captura_imagen');
        $captura = null;
        // Validar si la imagen es una cadena Base64 válida
        if (strpos($imageData, 'data:image/png;base64,') !== false) {
            $captura = $imageData;
        }

        EmergencyPhase8_Zonas::create([
            'folio' => $phase1->id,
            'id_phase' => $phase8->id,
            'zona' => $request['zonaslabel'],
            'coordinate' => $request['coordinate'],
            'capturas' => $captura,
        ]);

        // foreach ($request as $item) {

        //     // Inicializar las variables
        //     $descripcion = null;
        //     $abreviatura = null;
        //     $valor = null;
        //         // Validamos que tenga ambos campos antes de asignar
        //         if (isset($request['descripcion'], $request['abreviatura'])) {
        //             $descripcion = $request['descripcion'];
        //             $abreviatura = $request['abreviatura'];
        //         }

        //     // Asignar el valor de los ojos, si existe
        //     if (isset($request['ojos'])) {
        //         $valor = $request['ojos']; // Si 'ojos' es un array, lo unimos con coma
        //     }

        //     // Verificar que los valores necesarios estén presentes antes de crear el registro
        //     if ($descripcion && $abreviatura && $valor !== null) {
        //         EmergencyPhase8::create([
        //             // Exploración
        //             'folio' => $request['folio'],
        //             'descripcion' => $descripcion,
        //             'abreviatura' => $abreviatura,
        //             'valor' => $valor,

        //             // Signos Vitales
        //             'hora' => $request['hora'],
        //             'fr' => $request['fr'],
        //             'fc' => $request['fc'],
        //             'tas' => $request['tas'],
        //             'tad' => $request['tad'],
        //             'spo2' => $request['spo2'],
        //             'temp' => $request['temp'],
        //             'glasgow' => $request['glasgow'],
        //             'trauma_score' => $request['trauma_score'],
        //             'ekg' => $request['ekg'],

        //             // Interrogatorio
        //             'atendido' => $request['atendido'],
        //             'alergias' => $request['alergias'],
        //             'medicamentos' => $request['medicamentos'],
        //             'antecedentes' => $request['antecedentes'],
        //             'ultima_comida' => $request['ultima_comida'],
        //             'eventos_previos' => $request['eventos_previos'],
        //             'condicion' => $request['condicion'],
        //             'prioridad' => $request['prioridad'],
        //         ]);
        //     }
        // }

        EmergencyPhase9::create([
            'folio' => $phase1->id,
            'via_aerea' => $request['via_aerea'] ?? null,
            'control_cervical' => $request['control_cervical'] ?? null,
            'asistencia_ventilatoria' => $request['asistencia_ventilatoria'] ?? null,
            'FREC' => $request['FREC'] ?? null,
            'volumen' => $request['volumen'] ?? null,
            'heperventilacion' => $request['heperventilacion'] ?? null,
            'descompresión_pleural_con_agua' => $request['descompresión_pleural_con_agua'] ?? null,
            'oxigenoterapia' => json_encode($request['oxigenoterapia'] ?? []),
            'litros' => $request['litros'] ?? null,
            'hemitorax' => json_encode($request['hemitorax'] ?? []),
            'control_hemorragias' => $request['control_hemorragias'] ?? null,
            'vias_venosas' => json_encode($request['vias_venosas'] ?? []),
            'sitio_aplicacion' => $request['sitio_aplicacion'] ?? null,
            'tipo_soluciones' => json_encode($request['tipo_soluciones'] ?? []),
            'soluciones' => json_encode($request['soluciones'] ?? []),
            'medicamentos_terapia' => json_encode($request['medicamentos_terapia'] ?? []),
            'rcp_procedimientos' => json_encode($request['rcp_procedimientos'] ?? []),

        ]);




        return redirect()->route('socorros.index')->with('success', 'Emergencia guardados correctamente.');
    }

    public function emergencyUpdate(Request $request, $id)
    {



        // //Fase 1
        // $validatedPhase1 = $request->validate([
        //     'hora_llamada' => 'nullable|date_format:H:i',
        //     'hora_despacho' => 'nullable|date_format:H:i',
        //     'hora_arribo' => 'nullable|date_format:H:i',
        //     'hora_traslado' => 'nullable|date_format:H:i',
        //     'hora_hospital' => 'nullable|date_format:H:i',
        //     'hora_disponible' => 'nullable|date_format:H:i',
        //     'motivo_atencion' => 'nullable|string',
        //     'direccion_accidente' => 'nullable|string|max:255',
        //     'entre_calles_accidente' => 'nullable|string|max:255',
        //     'colonia_accidente' => 'nullable|string|max:255',
        //     'municipio_accidente' => 'nullable|string|max:255',
        //     'lugar_ocurrencia' => 'nullable|string',
        //     'otro_lugar' => 'nullable|string|max:255',
        // ]);
        // //Fase 2
        // $validatedPhase2 = $request->validate([
        //     'ambulance_id' => 'nullable|exists:inventario_vehiculos,id',
        //     'chofer_id' => 'nullable|exists:Personal,id',
        //     'paramedico_id' => 'nullable|exists:Personal,id',
        //     'helicoptero_id' => 'nullable|exists:inventario_vehiculos,id',
        // ]);
        // //Fase 3
        // $validatedPhase3 = $request->validate([
        //     // Validaciones para los campos de la fase 3
        //     'nombre' => 'nullable|string|max:255',
        //     'apellido_paterno' => 'nullable|string|max:255',
        //     'apellido_materno' => 'nullable|string|max:255',
        //     'edad' => 'nullable|integer|min:0',
        //     'meses' => 'nullable|integer|min:0|max:11',
        //     'sexo' => 'nullable|in:masculino,femenino,otro',
        //     'tipo_sangre' => 'nullable|string|max:10',
        //     'domicilio' => 'nullable|string|max:255',
        //     'colonia' => 'nullable|string|max:255',
        //     'alcaldia' => 'nullable|string|max:255',
        //     'telefono' => 'nullable|string|max:20',
        //     'ocupacion' => 'nullable|string|max:255',
        //     'derechohabiente' => 'nullable|string|max:255',
        //     'compania_seguro' => 'nullable|string|max:255',
        // ]);
        //  //Fase 4
        // $validatedPhase4 = $request->validate([
        //     'agente_causal' => 'nullable|string|max:255',
        //     'especificar' => 'nullable|string|max:255',
        //     'lesionescausadas' => 'nullable|string|max:255',
        //     'tipo_accidente' => 'nullable|string|max:255',
        //     'atropelladopor' => 'nullable|string|max:255',
        //     'colision' => 'nullable|string|max:255',
        //     'contraobjeto' => 'nullable|string|max:255',
        //     'impacto' => 'nullable|string|max:255',
        //     'hundimiento' => 'nullable|integer',
        //     'parabrisas' => 'nullable|string|max:255',
        //     'volante' => 'nullable|string|max:255',
        //     'bolsaaire' => 'nullable|string|max:255',
        //     'cinturon' => 'nullable|string|max:255',
        //     'dentrovehiculo' => 'nullable|string|max:255',
        // ]);
        // //Fase 5
        // $validatedPhase5 = $request->validate([
        //     'agente_causal' => 'nullable|string|max:255',
        //     'especificar' => 'nullable|string|max:255',
        //     'lesionescausadas' => 'nullable|string|max:255',
        //     'tipo_accidente' => 'nullable|string|max:255',
        //     'atropelladopor' => 'nullable|string|max:255',
        //     'colision' => 'nullable|string|max:255',
        //     'contraobjeto' => 'nullable|string|max:255',
        //     'impacto' => 'nullable|string|max:255',
        //     'hundimiento' => 'nullable|integer',
        //     'parabrisas' => 'nullable|string|max:255',
        //     'volante' => 'nullable|string|max:255',
        //     'bolsaaire' => 'nullable|string|max:255',
        //     'cinturon' => 'nullable|string|max:255',
        //     'dentrovehiculo' => 'nullable|string|max:255',
        //     'origen_probable' => 'nullable|string|max:255',
        //     'especificarOrigen' => 'nullable|string|max:255',
        //     'primeravez' => 'nullable|string|max:255',
        //     'subsecuente' => 'nullable|string|max:255',
        // ]);
        // //Fase 6
        // $validatedPhase6 = $request->validate([
        //     'gesta' => 'nullable|string|max:255',
        //     'cesareas' => 'nullable|string|max:255',
        //     'para' => 'nullable|string|max:255',
        //     'aborto' => 'nullable|string|max:255',
        //     'semanas' => 'nullable|string|max:255',
        //     'fechaParto' => 'nullable|date',
        //     'membranas' => 'nullable|string|max:255',
        //     'fum' => 'nullable|date',
        //     'horaContracciones' => 'nullable|date_format:H:i',
        //     'frecuencia' => 'nullable|string|max:255',
        //     'duracion' => 'nullable|string|max:255',
        //     'horanacimiento' => 'nullable|date_format:H:i',
        //     'lugar_post_parto' => 'nullable|string|max:255',
        //     'placenta_expulsada' => 'nullable|string|max:255',
        //     'estado_producto' => 'nullable|string|in:vivo,muerto',
        //     'genero_producto' => 'nullable|string|in:masculino,femenino',
        //     'apgar1' => 'nullable|integer|min:0|max:10',
        //     'apgar5' => 'nullable|integer|min:0|max:10',
        // ]);
        // //Fase 7
        // $validatedPhase7 = $request->validate([
        //     'nivel_conciencia' => 'nullable|string',
        //     'via_aerea' => 'nullable|string',
        //     'reflejo_deglutacion' => 'nullable|string',
        //     'ventilacion_observacion' => 'nullable|string',
        //     'ventilacion_auscultacion' => 'nullable|string',
        //     'ventilacion_hemitorax' => 'nullable|string',
        //     'ventilacion_sitio' => 'nullable|string',
        //     'circulacion_pulsos' => 'nullable|string',
        //     'circulacion_calidad' => 'nullable|string',
        //     'circulacion_piel' => 'nullable|string',
        //     'circulacion_caracteristicas' => 'nullable|string',
        // ]);
        // Fase 8
        // $validatedPhase8 = $request->validate([ //Exploración Fisica
        //     'exploracion_fisica' => 'nullable|array',  // Validar que el array no esté vacío
        //     'exploracion_fisica.*' => 'string',  // Cada valor dentro del array debe ser un string
        // ]);

        // $validatedPhase9 = $request->validate([
        //     'via_aerea' => 'nullable|array',
        //     'via_aerea.*' => 'string', // Validar que cada opción seleccionada sea una cadena
        //     'control_cervical' => 'nullable|string|in:manual,collarin_rigido,collarin_blando',

        //     'asistencia_ventilatoria' => 'nullable|array',
        //     'asistencia_ventilatoria.*' => 'string',
        //     'frecuencia' => 'nullable|string',
        //     'volumen' => 'nullable|string',

        //     'oxigenoterapia' => 'nullable|array',
        //     'oxigenoterapia.*' => 'string',
        //     'litros' => 'nullable|string',

        //     'procedimientos_adicionales' => 'nullable|array',
        //     'procedimientos_adicionales.*' => 'string',

        //     'control_hemorragias' => 'nullable|array',
        //     'control_hemorragias.*' => 'string',

        //     'vias_venosas' => 'nullable|array',
        //     'vias_venosas.linea_iv' => 'nullable|string',
        //     'vias_venosas.cateter' => 'nullable|string',

        //     'sitio_aplicacion' => 'nullable|string',

        //     'tipo_soluciones' => 'nullable|array',
        //     'tipo_soluciones.*' => 'string',
        //     'soluciones' => 'nullable|array',
        //     'soluciones.especifique' => 'nullable|string',
        //     'soluciones.cantidad' => 'nullable|string',
        //     'soluciones.infusiones' => 'nullable|string',

        //     'medicamentos_terapia' => 'nullable|array',
        //     'medicamentos_terapia.*.hora' => 'nullable|date_format:H:i',
        //     'medicamentos_terapia.*.medicamento' => 'nullable|string',
        //     'medicamentos_terapia.*.dosis' => 'nullable|string',
        //     'medicamentos_terapia.*.via_administracion' => 'nullable|string',
        //     'medicamentos_terapia.*.terapia_electrica' => 'nullable|string',

        //     'rcp_procedimientos' => 'nullable|array',
        //     'rcp_procedimientos.*' => 'nullable|string',

        // ]);

        $exploraciones = [
            ['descripcion' => 'Deformidades', 'abreviatura' => 'D'],
            ['descripcion' => 'Contusiones', 'abreviatura' => 'CD'],
            ['descripcion' => 'Penetraciones', 'abreviatura' => 'P'],
            ['descripcion' => 'Movimiento Paradójico', 'abreviatura' => 'MP'],
            ['descripcion' => 'Crepitación', 'abreviatura' => 'C'],
            ['descripcion' => 'Heridas', 'abreviatura' => 'H'],
            ['descripcion' => 'Fracturas', 'abreviatura' => 'F'],
            ['descripcion' => 'Enfisema Subcutáneo', 'abreviatura' => 'ES'],
            ['descripcion' => 'Quemaduras', 'abreviatura' => 'Q'],
            ['descripcion' => 'Laceraciones', 'abreviatura' => 'L'],
            ['descripcion' => 'Edema', 'abreviatura' => 'E'],
            ['descripcion' => 'Alteración de Sensibilidad', 'abreviatura' => 'AS'],
            ['descripcion' => 'Alteración de Movilidad', 'abreviatura' => 'AM'],
            ['descripcion' => 'Dolor', 'abreviatura' => 'DO'],
            ['descripcion' => 'Amputación', 'abreviatura' => 'AP'],
        ];

        try{
         // Actualizar datos de la Fase 1
        $phase1 = EmergencyPhase1::findOrFail($id);
        $phase1->update($request->all());
        // Actualizar datos de la Fase 2
        $phase2 = EmergencyPhase2::where('folio', $id)->first();
        $phase2->update($request->all());
        // Actualizar datos de la Fase 3
        $phase3 = EmergencyPhase3::where('folio', $id)->first();
        $phase3->update($request->all());
        // Actualizar datos de la Fase 4
        $phase4 = EmergencyPhase4::where('folio', $id)->first();
        $phase4->update($request->all());
        // Actualizar datos de la Fase 5
        $phase5 = EmergencyPhase5::where('folio', $id)->first();
        $phase5->update($request->all());
        // Actualizar datos de la Fase 6
        $phase6 = EmergencyPhase6::where('folio', $id)->first();
        $phase6->update($request->all());
        // Actualizar datos de la Fase 7
        $phase7 = EmergencyPhase7::where('folio', $id)->first();
        $phase7->update(
            [
                'nivel_conciencia' => $request['nivel_conciencia'] ?? null,
                'viaaerea' => $request['viaaerea'] ?? null,
                'reflejo_deglutacion' => $request['reflejo_deglutacion'] ?? null,
                'ventilacion_observacion' => $request['ventilacion_observacion'] ?? null,
                'ventilacion_auscultacion' => $request['ventilacion_auscultacion'] ?? null,

                'ventilacion_hemitorax' => $request['ventilacion_hemitorax'] ?? [],
                'ventilacion_sitio' => $request['ventilacion_sitio'] ?? [],
                'circulacion_pulsos' => $request['circulacion_pulsos'],
                'circulacion_calidad' => $request['circulacion_calidad'] ?? [],
                'circulacion_piel' => $request['circulacion_piel'],
                'circulacion_caracteristicas' => $request['circulacion_caracteristicas'],
            ]
        );
        // Actualizar datos de la Fase 8
        $phase8 = EmergencyPhase8::where('folio', $id)->first();

        $validatedData = $request->validate([
            'exploracion_fisica' => 'nullable|array'
        ]);

        $phase8->update([
            'exploracion_fisica' => isset($validatedData['exploracion_fisica'])
                    ? json_encode($validatedData['exploracion_fisica'])
                    : null, // Convertir a JSON si está presente
            'valor' => $request['ojos'],

            // Signos Vitales
            'hora_es' => $request['hora_es'],
            'fr' => $request['fr'],
            'fc' => $request['fc'],
            'tas' => $request['tas'],
            'tad' => $request['tad'],
            'spo2' => $request['spo2'],
            'temp' => $request['temp'],
            'glasgow' => $request['glasgow'],
            'trauma_score' => $request['trauma_score'],
            'ekg' => $request['ekg'],

            // Interrogatorio
            'atendido' => $request['atendido'],
            'alergias' => $request['alergias'],
            'medicamentos' => $request['medicamentos'],
            'antecedentes' => $request['antecedentes'],
            'ultima_comida' => $request['ultima_comida'],
            'eventos_previos' => $request['eventos_previos'],
            'condicion' => $request['condicion'],
            'estabilidad' => $request['estabilidad'],
            'prioridad' => $request['prioridad'],
        ]);

        $phase8_zona = EmergencyPhase8_Zonas::where('folio', $id)->first();

        $imageData = $request->input('captura_imagen');
        $captura = null;
        // Validar si la imagen es una cadena Base64 válida
        if (strpos($imageData, 'data:image/png;base64,') !== false) {
            $captura = $imageData;
        }
        // Actualizar los datos en la base de datos
        $phase8_zona->update([
            'id_phase' => $phase8->id,
            'zona' => $request['zonaslabel'],
            'coordinate' => $request['coordinate'],
            'capturas' => $captura,
        ]);

        $phase9 = EmergencyPhase9::where('folio', $id)->first();
        $frec = null;
        $volumen = null;
        if ($request['asistencia_ventilatoria'] !== 'ventilador_automatico') {
            $frec = null;
            $volumen = null;
        } else {
            $frec = $request['FREC'] ?? null;
            $volumen = $request['volumen'] ?? null;
        }

        $phase9->update([
            'via_aerea' => $request['via_aerea'] ?? null,
            'control_cervical' => $request['control_cervical'] ?? null,
            'asistencia_ventilatoria' => $request['asistencia_ventilatoria'] ?? null,
            'FREC' => $frec,
            'volumen' => $volumen,
            'heperventilacion' => $request['heperventilacion'] ?? null,
            'descompresión_pleural_con_agua' => $request['descompresión_pleural_con_agua'] ?? null,
            'oxigenoterapia' => $request['oxigenoterapia'] ?? [],
            'litros' => $request['litros'] ?? null,
            'hemitorax' => $request['hemitorax'] ?? null,
            'control_hemorragias' => $request['control_hemorragias'] ?? null,
            'vias_venosas' => $request['vias_venosas'] ?? [],
            'sitio_aplicacion' => $request['sitio_aplicacion'] ?? null,
            'tipo_soluciones' => $request['tipo_soluciones'] ?? [],
            'soluciones' => $request['soluciones'] ?? [],
            'medicamentos_terapia' => $request['medicamentos_terapia'] ?? [],
            'rcp_procedimientos' => $request['rcp_procedimientos'] ?? [],
        ]);

        } catch (\Exception $e) {
            return redirect()->route('socorros.index')->with('error', 'Error al actualizar la emergencia: ' . $e->getMessage());
        }
        return redirect()->route('socorros.index')->with('success', 'Emergencia actualizo correctamente.');
    }

    public function generatePDF($id)
{
    \Carbon\Carbon::setLocale('es');

    // Obtener dinámicamente todas las fases relacionadas
    $phases = [];
    for ($i = 1; $i <= 9; $i++) {
        $modelClass = "App\\Models\\EmergencyPhase{$i}";
        $phases["phase{$i}"] = $i == 1
            ? $modelClass::findOrFail($id)
            : $modelClass::where('folio', $id)->first();
    }

    $phases["phase8_zona"] = EmergencyPhase8_Zonas::where('folio', $id)->first();
    $imageData = $phases["phase8_zona"]->capturas ?? null;

    if ($imageData && strpos($imageData, 'data:image/png;base64,') !== false) {
        // Eliminar el prefijo 'data:image/png;base64,' antes de decodificar
        $base64String = str_replace('data:image/png;base64,', '', $imageData);
    }

    // Guardar el string Base64 de la imagen en el array de fases
    $phases["phase8_zona_capturas"] = $base64String ?? null;

    // Generar el PDF con los datos y enviarlo a la vista
    $pdf = Pdf::loadView('pdf.emergency', $phases)
        ->setPaper('A4', 'portrait')
        ->setOption('margin-top', '0mm')       // Eliminar margen superior
        ->setOption('margin-right', '0mm')     // Eliminar margen derecho
        ->setOption('margin-bottom', '0mm')    // Eliminar margen inferior
        ->setOption('margin-left', '0mm')      // Eliminar margen izquierdo
        ->setOption('disable-smart-shrinking', true) // Desactiva el ajuste automático
        ->setOption('viewport-size', '1024x768')
        ->setOption('isHtml5ParserEnabled', true)
        ->setOption('isPhpEnabled', true);    // Mejora renderizado del tamaño de vista

    // Stream del PDF
    return $pdf->stream('emergency_report.pdf');
}




}
