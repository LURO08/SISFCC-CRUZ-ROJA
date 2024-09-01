<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CajeroController;
use App\Http\Controllers\farmaciaController;
use App\Http\Middleware\RedirectIfNotProperRole;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PacientesController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', RedirectIfNotProperRole::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/cajero', [CajeroController::class, 'index'])->name('cajero.index');
    Route::get('/farmacia', [farmaciaController::class, 'index'])->name('farmacia.index');
});

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/cajero', [CajeroController::class, 'index'])->name('cajero.index');
    Route::get('/farmacia', [farmaciaController::class, 'index'])->name('farmacia.index');


    // ADMIN
        //ADMIN GESTION USUARIOS
        Route::get('/admin/users/create', [AdminController::class, 'register'])
        ->name('admin.users.create');
        Route::get('/admin/users', [AdminController::class, 'usuarios'])
        ->name('admin.users')
        ->middleware('auth');
        Route::get('/admin/users/edit/{id}', [AdminController::class, 'edit'])
        ->name('admin.users.edit')
        ->middleware('auth');
        Route::put('/admin/users/{user}', [AdminController::class, 'update'])
        ->name('admin.users.update')
        ->middleware('auth');
        Route::delete('/admin/users/{user}', [AdminController::class, 'delete'])
        ->name('admin.users.destroy')
        ->middleware('auth');
        Route::get('/admin/users/create', [AdminController::class, 'create'])
        ->name('admin.users.create')
        ->middleware('auth');
        Route::post('/admin/users', [AdminController::class, 'store'])
        ->name('admin.users.store')
        ->middleware('auth');


        //ADMIN farmacia
        Route::get('/admin/farmacia', [AdminController::class,'farmaciaDash'])
        ->name('admin.farmacia.index')
        ->middleware('auth');


    //farmacia
    Route::get('/farmacia/productos', [ProductoController::class,'index'])
    ->name('farmacia.product.index')
    ->middleware('auth');

    Route::resource('productos', ProductController::class);
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('farmacia.product.destroy');
    Route::get('/farmacia/productos/create', [ProductoController::class, 'create'])
    ->name('farmacia.product.create')
    ->middleware('auth');
    Route::post('/farmacia/productos', [ProductoController::class, 'store'])
    ->name('farmacia.product.store')
    ->middleware('auth');
    Route::get('/farmacia/productos/edit/{id}', [ProductoController::class, 'edit'])
    ->name('farmacia.product.edit')
    ->middleware('auth');
    Route::put('/farmacia/productos/update/{id}', [ProductoController::class, 'update'])
    ->name('farmacia.product.update')->middleware('auth');


    //Doctor
    Route::get('/doctor/Pacientes', [PacientesController::class,'index'])
    ->name('doctor.pacientes.index')
    ->middleware('auth');

    Route::resource('Pacientes', PacientesController::class);

    Route::delete('/Pacientes/{paciente}', [PacientesController::class, 'destroy'])
    ->name('doctor.pacientes.destroy');

    Route::get('/doctor/Pacientes/create', [PacientesController::class, 'create'])
    ->name('doctor.pacientes.create')
    ->middleware('auth');
    Route::post('/doctor/Pacientes', [PacientesController::class, 'store'])
    ->name('doctor.pacientes.store')
    ->middleware('auth');
    Route::get('/doctor/Pacientes/edit/{id}', [PacientesController::class, 'edit'])
    ->name('doctor.pacientes.edit')
    ->middleware('auth');
    Route::put('/doctor/Pacientes/update/{id}', [PacientesController::class, 'update'])
    ->name('doctor.pacientes.update')->middleware('auth');
