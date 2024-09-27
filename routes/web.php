<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ropaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/create-user', [UserController::class, 'createUser']);

//RUTAS DE ROPA
Route::get('/ropas', [ropaController::class, 'getAll']); // GET ALL
Route::get('/ropa/{id}', [ropaController::class, 'getbyId']); // GET BY ID
Route::post('/ropacreate', [ropaController::class, 'create']); // CREATE
Route::put('/ropaupdate/{id}', [ropaController::class, 'update']); // UPDATE
Route::delete('/ropadelete/{id}', [ropaController::class, 'delete']); // DELETE

Route::get('/', function () {
    return view('welcome');
});
