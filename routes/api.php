<?php

use App\Http\Controllers\Adresses\GetAddressByZipCodeController;
use App\Http\Controllers\Patients\DeletePatientController;
use App\Http\Controllers\Patients\EditPatientController;
use App\Http\Controllers\Patients\GetPatientController;
use App\Http\Controllers\Patients\ListPatientsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'patients'], function () {
    Route::get('/', ListPatientsController::class);
    Route::get('/{cpf}', GetPatientController::class);
    Route::delete('/{patientId}', DeletePatientController::class);
    Route::put('/{patientId}', EditPatientController::class);
});

Route::group(['prefix' => 'adresses'], function () {
    Route::get('cep/{cep}', GetAddressByZipCodeController::class);
});
