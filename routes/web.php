<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vacina', function () {
    return view('cartaoVacina');
});

Route::get('/pets', [App\Http\Controllers\PetController::class, 'index']);

Route::get('/cadastro_pet', function () {
    return view('cadastroPet');
});
Route::post('/pet/save', [App\Http\Controllers\PetController::class, 'store']);