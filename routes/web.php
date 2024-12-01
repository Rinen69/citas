<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MedicoController;
use App\Http\Middleware\admin;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes;

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['role:admin'])->group(function () {
    Route::resource('/products', CajaController::class);
});


Route::resource('/asignaservicios', App\Http\Controllers\AsignaservicioController::class);
Route::resource('/servicios', App\Http\Controllers\ServicioController::class);
Route::resource('/disponibles', App\Http\Controllers\DisponibleController::class);
Route::resource('/medicos', App\Http\Controllers\MedicoController::class);
Route::resource('/consultas', App\Http\Controllers\ConsultaController::class);
Route::resource('/pacientes', App\Http\Controllers\PacienteController::class);
Route::get('/medicos/servicio', [ConsultaController::class, 'getMedicosByServicio'])->name('medicos.servicio');

Route::get('/get-disponibles-servicio/{servicio_id}', [MedicoController::class, 'getDisponiblesPorServicio']);

Route::resource('/triaje', App\Http\Controllers\TriajeController::class);
Route::get('/get-disponibles', [ConsultaController::class, 'getDisponibles']);
Route::get('/get-disponibles', [ConsultaController::class, 'getDisponibles'])->name('get-disponibles');
Route::post('/consultas/getDisponibles', [ConsultaController::class, 'getDisponibles'])->name('consultas.getDisponibles');
