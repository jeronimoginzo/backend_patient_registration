<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Requests\RegisterPatientRequest;
use App\Http\Requests\PatientData;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/status', function () {
    return response()->json(['status' => 'API is working!'], 200);
});

Route::get('/list', [UsersController::class, 'list']);


Route::post('/register', [UsersController::class, 'actionRegisterPatient']);
