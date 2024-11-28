<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CajeroController;
use App\Http\Controllers\farmaciaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProveedorController;

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

            // Admin farmacia
            Route::get('/admin/farmacia', [AdminController::class, 'farmaciaDash'])->name('admin.farmacia.index');
            Route::get('/admin/consultorio/pacientes', [AdminController::class, 'consultorioIndex'])->name('admin.consultorio.index');
            Route::post('/verificar-stock', [TuControlador::class, 'verificarStock'])->name('verificar.stock');

            Route::get('/farmacia/recetas', [AdminController::class, 'index'])->name('farmacia.recetas.index');
            Route::get('/farmacia/reportes', [AdminController::class, 'index'])->name('farmacia.reportes.index');
            Route::post('admin/reporte/descargar', [AdminController::class, 'generarReporte'])->name('admin.reporte.descargar');

            Route::get('/admin/personal', [PersonalController::class, 'index'])->name('admin.personal.index');
            Route::post('/admin/personal', [PersonalController::class, 'storePersonal'])->name('admin.personals.store');
            Route::put('/admin/personal/{user}', [PersonalController::class, 'update'])->name('admin.personals.update');
        Route::delete('/admin/personal/{personal}', [PersonalController::class, 'destroy'])->name('admin.personals.destroy');
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

});
