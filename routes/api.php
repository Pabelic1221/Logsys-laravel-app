<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\RegistrationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Registration route
Route::post('/register', [RegistrationController::class, 'register']);

// Other routes for AuthController, DataController, etc.
// Example routes:
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/data', [DataController::class, 'getData']);

