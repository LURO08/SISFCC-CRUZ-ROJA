<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    PersonalController,
    DashboardController,
    DoctorController,
    CajeroController,
    FarmaciaController,
    MedicamentoController,
    PacientesController,
    ProveedorController,
    AlmacenController,
    EmergenciasController
};



// Rutas protegidas por autenticación y rol
Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Admin
    Route::middleware('role:admin')->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
            // Gestión de usuarios
            Route::get('/admin/users/create', [AdminController::class, 'register'])->name('admin.users.create');
            Route::get('/admin/users', [AdminController::class, 'usuarios'])->name('admin.users')->middleware('auth');
            Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])->name('admin.users.edit')->middleware('auth');
            Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update')->middleware('auth');
            Route::delete('/admin/users/{user}', [AdminController::class, 'delete'])->name('admin.users.destroy')->middleware('auth');
            Route::delete('/admin/doctores/{doctor}', [AdminController::class, 'deleteDoctor'])->name('admin.doctor.destroy')->middleware('auth');
            Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create')->middleware('auth');
            Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store')->middleware('auth');

            //Farmacia
            Route::get('/admin/farmacia', [AdminController::class, 'farmaciaDash'])->name('admin.farmacia.index');
            Route::get('/admin/consultorio/pacientes', [AdminController::class, 'consultorioIndex'])->name('admin.consultorio.index');
            Route::post('/verificar-stock', [TuControlador::class, 'verificarStock'])->name('verificar.stock');
            Route::get('/farmacia/recetas', [AdminController::class, 'index'])->name('farmacia.recetas.index');
            Route::get('/farmacia/reportes', [AdminController::class, 'index'])->name('farmacia.reportes.index');
            Route::post('admin/reporte/descargar', [AdminController::class, 'generarReporte'])->name('admin.reporte.descargar');

            //Personal
            Route::get('/admin/personal', [PersonalController::class, 'index'])->name('admin.personal.index');
            Route::post('/admin/personal', [PersonalController::class, 'storePersonal'])->name('admin.personals.store');
            Route::put('/admin/personal/{user}', [PersonalController::class, 'update'])->name('admin.personals.update');
            Route::delete('/admin/personal/{personal}', [PersonalController::class, 'destroy'])->name('admin.personals.destroy');

            //Facturas
            Route::get('admin/facturas', [AdminController::class, 'facturas'])->name('facturas.index');
            Route::get('admin//factura/{id}/download', [AdminController::class, 'facturadownload'])->name('admin.factura.download');
            Route::post('/admin/factura/{solicitud}/subir-factura', [AdminController::class, 'subirFactura'])->name('admin.facturas.subir');

            //Reportes
            Route::get('admin/reportes', [AdminController::class, 'reportes'])->name('admin.reportes.index');

            //Servicios
            Route::get('/admin/servicios', [AdminController::class, 'indexServicios'])->name('admin.servicios.index');
            Route::post('/admin/servicios', [AdminController::class, 'storeServicio'])->name('admin.servicio.store');
            Route::put('/admin/servicios/{servicio}', [AdminController::class, 'updateServicio'])->name('admin.servicio.update');
            Route::delete('/admin/servicios/{servicio}', [AdminController::class, 'destroyServicio'])->name('admin.servicio.destroy');

            Route::get('admin/cobros', [AdminController::class, 'IndexCobros'])->name('admin.cobros.index');
            Route::post('/admin/cobros', [AdminController::class, 'storeCobros'])->name('admin.cobro.store');
            Route::put('/admin/cobros/{cobro}', [AdminController::class, 'updateCobros'])->name('admin.cobro.update');
            Route::delete('/admin/cobros/{cobro}', [AdminController::class, 'destroyCobros'])->name('admin.cobro.destroy');

        });

        // Doctor
        Route::middleware('role:doctor')->group(function () {
            Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
            Route::get('/doctor/Pacientes', [PacientesController::class, 'index'])->name('doctor.pacientes.index')->middleware('auth');
            Route::resource('Pacientes', PacientesController::class);
            Route::delete('/Pacientes/{paciente}', [PacientesController::class, 'destroy'])->name('doctor.pacientes.destroy');
            Route::post('/doctor/pacientes/store', [PacientesController::class, 'store'])->name('doctor.pacientes.store');
            Route::get('/doctor/Pacientes/edit/{id}', [PacientesController::class, 'edit'])->name('doctor.pacientes.edit')->middleware('auth');
            Route::put('/doctor/Pacientes/update/{id}', [PacientesController::class, 'update'])->name('doctor.pacientes.update')->middleware('auth');

            Route::delete('/doctor/receta/{receta}', [DoctorController::class, 'destroy'])->name('doctor.receta.destroy');
            Route::post('/doctor/receta/store', [DoctorController::class, 'store'])->name('doctor.receta.store');
            Route::put('/doctor/receta/update/{id}', [DoctorController::class, 'update'])->name('doctor.receta.update')->middleware('auth');
            Route::get('/receta/{id}/descargar', [DoctorController::class, 'descargarReceta'])->name('receta.descargar');

            Route::get('/doctor/recetaview/{receta}', [DoctorController::class, 'recetaview'])->name('doctor.receta.view');

        });

        // Cajero
        Route::middleware('role:cajero')->group(function () {
            Route::get('/cajero', [CajeroController::class, 'index'])->name('cajero.index');

            Route::post('/cajero/cobros', [CajeroController::class, 'storeCobro'])->name('cajero.cobros.store')->middleware('auth');
            Route::put('/cajero/cobros/update/{id}', [CajeroController::class, 'updateCobro'])->name('cajero.cobros.update')->middleware('auth');

            Route::post('/cajero/facturas', [CajeroController::class, 'storeSolicitudFactura'])->name('cajero.solicitar.factura.store')->middleware('auth');

            Route::get('/ticket/{id}/descargar', [CajeroController::class, 'DescargarPdf'])->name('ticket.descargar');
            Route::get('/factura/{id}/descargar', [CajeroController::class, 'DescargarFactura'])->name('factura.descargar');
            Route::get('/cobros/reporte', [CajeroController::class, 'generarReporteDiario'])->name('reporte.diario');
            Route::post('/cobros/reporte/descargar', [CajeroController::class, 'descargarReporte'])->name('cobros.reporte.descargar');



        });

        // Farmacia
        Route::middleware('role:admin,farmacia')->group(function () {
            Route::get('/farmacia', [farmaciaController::class, 'index'])->name('farmacia.index');
            Route::get('/farmacia/productos', [MedicamentoController::class, 'index'])->name('farmacia.product.index')->middleware('auth');
            Route::resource('productos', MedicamentoController::class);
            Route::delete('/productos/{producto}', [MedicamentoController::class, 'destroy'])->name('farmacia.product.destroy');
            Route::get('/farmacia/productos/create', [MedicamentoController::class, 'create'])->name('farmacia.product.create')->middleware('auth');
            Route::post('/farmacia/productos', [MedicamentoController::class, 'store'])->name('farmacia.product.store')->middleware('auth');
            Route::get('/farmacia/productos/edit/{id}', [MedicamentoController::class, 'edit'])->name('farmacia.product.edit')->middleware('auth');
            Route::put('/farmacia/productos/update/{id}', [MedicamentoController::class, 'update'])->name('farmacia.product.update')->middleware('auth');

            Route::put('/farmacia/proveedores/update/{id}', [ProveedorController::class, 'update'])->name('farmacia.proveedor.update')->middleware('auth');
            Route::get('/farmacia/proveedores', [ProveedorController::class, 'index'])->name('farmacia.proveedores.index')->middleware('auth');
            Route::delete('/farmacia/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('farmacia.proveedor.destroy');
            Route::post('/farmacia/proveedores', [ProveedorController::class, 'store'])->name('farmacia.proveedor.store')->middleware('auth');

            Route::post('/surtir/receta', [farmaciaController::class, 'surtirReceta'])->name('farmacia.surtir.receta')->middleware('auth');
            Route::post('/donaciones/medicamentos', [farmaciaController::class, 'Donaciones'])->name('farmacia.donaciones.medicammentos')->middleware('auth');
            Route::post('/pedidos/medicamentos', [farmaciaController::class, 'PedidosAProveedor'])->name('farmacia.pedidos.medicammentos')->middleware('auth');

            Route::post('/recetas/{id}/cobrar', [farmaciaController::class, 'cobrar'])->name('recetas.cobrar');


        });

          // Rutas específicas para el rol almacen
          Route::middleware('role:almacenista')->group(function () {
            Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacenista.index');

            // Rutas para el inventario vehicular
            Route::prefix('almacen/vehicular')->group(function () {
                Route::get('/', [AlmacenController::class, 'index'])->name('almacen.vehicular.index');
                Route::post('/', [AlmacenController::class, 'storeVehicular'])->name('almacen.vehicular.store');
                Route::get('/{id}/edit', [AlmacenController::class, 'editVehicular'])->name('almacen.vehicular.edit');
                Route::put('/{id}', [AlmacenController::class, 'updateVehicular'])->name('almacen.vehicular.update');
                Route::delete('/{id}', [AlmacenController::class, 'destroyVehicular'])->name('almacen.vehicular.destroy');
                Route::get('/almacen/vehicular/pdf', [AlmacenController::class, 'generateVehicularPDF'])->name('almacen.vehicular.pdf');
            });

            // Rutas para el inventario médico
            Route::prefix('almacen/medico')->group(function () {
                Route::get('/', [AlmacenController::class, 'index'])->name('almacen.medico.index');
                Route::get('/create', [AlmacenController::class, 'createMedico'])->name('almacen.medico.create');
                Route::post('/', [AlmacenController::class, 'storeMedico'])->name('almacen.medico.store');
                Route::get('/{id}/edit', [AlmacenController::class, 'editMedico'])->name('almacen.medico.edit');
                Route::put('/{id}', [AlmacenController::class, 'updateMedico'])->name('almacen.medico.update');
                Route::delete('/{id}', [AlmacenController::class, 'destroyMedico'])->name('almacen.medico.destroy');
                Route::get('/almacen/medico/pdf', [AlmacenController::class, 'generateMedicoPDF'])->name('almacen.medico.pdf');
            });

            // Rutas para el inventario de oficina
            Route::prefix('almacen/oficina')->group(function () {
                Route::get('/', [AlmacenController::class, 'index'])->name('almacen.oficina.index');
                Route::get('/create', [AlmacenController::class, 'createOficina'])->name('almacen.oficina.create');
                Route::post('/', [AlmacenController::class, 'storeOficina'])->name('almacen.oficina.store');
                Route::get('/{id}/edit', [AlmacenController::class, 'editOficina'])->name('almacen.oficina.edit');
                Route::put('/{id}', [AlmacenController::class, 'updateOficina'])->name('almacen.oficina.update');
                Route::delete('/{id}', [AlmacenController::class, 'destroyOficina'])->name('almacen.oficina.destroy');
                Route::get('/almacen/oficina/pdf', [AlmacenController::class, 'generateOficinaPDF'])->name('almacen.oficina.pdf');
            });

            // Rutas para el inventario de cómputo
            Route::prefix('almacen/computo')->group(function () {
                Route::get('/', [AlmacenController::class, 'index'])->name('almacen.computo.index');
                Route::get('/create', [AlmacenController::class, 'createComputo'])->name('almacen.computo.create');
                Route::post('/', [AlmacenController::class, 'storeEquipoComputo'])->name('almacen.computo.store');
                Route::get('/{id}/edit', [AlmacenController::class, 'editComputo'])->name('almacen.computo.edit');
                Route::put('/{id}', [AlmacenController::class, 'updateComputo'])->name('almacen.computo.update');
                Route::delete('/{id}', [AlmacenController::class, 'destroyComputo'])->name('almacen.computo.destroy');
                Route::get('/almacen/computo/pdf', [AlmacenController::class, 'generateComputoPDF'])->name('almacen.computo.pdf');
            });

            // Rutas para el inventario médico
            Route::prefix('almacen/limpieza')->group(function () {
                Route::get('/', [AlmacenController::class, 'index'])->name('almacen.limpieza.index');
                Route::get('/create', [AlmacenController::class, 'createLimpieza'])->name('almacen.limpieza.create');
                Route::post('/', [AlmacenController::class, 'storeLimpieza'])->name('almacen.limpieza.store');
                Route::get('/{id}/edit', [AlmacenController::class, 'editLimpieza'])->name('almacen.limpieza.edit');
                Route::put('/{id}', [AlmacenController::class, 'updateLimpieza'])->name('almacen.limpieza.update');
                Route::delete('/{id}', [AlmacenController::class, 'destroyLimpieza'])->name('almacen.limpieza.destroy');
                Route::get('/almacen/limpieza/pdf', [AlmacenController::class, 'generateLimpiezaPDF'])->name('almacen.limpieza.pdf');
            });


        });

          // Rutas específicas para el rol emergencias
        Route::middleware('role:socorros')->group(function () {
            Route::get('/Socorros', [EmergenciasController::class, 'index'])->name('socorros.index');
            Route::get('/Socorros/ambulance_services', [EmergenciasController::class, 'indexAmbulancesServices'])->name('socorros.ambulances.services.index');
            Route::post('/socorros/ambulance_services/store', [EmergenciasController::class, 'storeAmbulanceServices'])->name('ambulance_services.store');
            Route::post('/socorros/ambulance_services/end/{id}', [EmergenciasController::class, 'endService'])->name('ambulance_services.end');

            Route::get('/Socorros/emergency', [EmergenciasController::class, 'registerEmergency'])->name('socorros.emergency.register');
            Route::post('/emergency', [EmergenciasController::class, 'emergencyStore'])->name('emergencia.store');
            Route::put('/emergency/update/{id}', [EmergenciasController::class, 'emergencyUpdate'])->name('emergencia.update');
        });


});
