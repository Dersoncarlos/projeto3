<?php

use App\Http\Controllers\Patients\DeletePatientController;
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
    Route::delete('/{patientId}', DeletePatientController::class);
});
