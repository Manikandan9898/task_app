<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[DashboardController::class,'index'])->name('index');
Route::get('/owner',[MasterController::class,'owners'])->name('owner_master');
Route::get('/company',[MasterController::class,'company'])->name('company_master');
Route::get('/vehicle', [MasterController::class, 'vehicle'])->name('vehicle_master');

Route::post('/owner', [MasterController::class, 'store'])->name('owner.store');
Route::post('/company_store', [MasterController::class, 'company_store'])->name('company.store');
Route::post('/vehicle/store', [MasterController::class, 'vehicle_store'])->name('vehicle.store');

Route::get('/vehicles', [VehicleController::class, 'vehicle_index'])->name('vehicle.filter');
