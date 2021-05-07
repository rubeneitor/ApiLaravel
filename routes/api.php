<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ControllerUsuario;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Rutas

    //Registro usuario
    Route::post('/registro', [ControllerUsuario::class, 'register']);

    //Recuperacion contraseña por email 1
    Route::post('/recuperarCont1', [ControllerUsuario::class, 'recoverPass1']);

    //Recuperacion contraseña por email 2
    Route::post('/recuperarCont2', [ControllerUsuario::class, 'recoverPass2']);

    //Login usuario
    Route::post('/login', [ControllerUsuario::class, 'login']);

    //Logout usuario
    Route::post('/logout', [ControllerUsuario::class, 'logout']);
