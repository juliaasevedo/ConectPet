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
Auth::routes();
Route::group(['middleware' => 'auth'], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/vacina', function () {
        return view('cartaoVacina');
    });

    Route::get('/pets', [App\Http\Controllers\PetController::class, 'index']);

    Route::get('/cadastro_pet', [App\Http\Controllers\PetController::class, 'cadastroPet']);

    Route::post('/pet/save', [App\Http\Controllers\PetController::class, 'store']);

    Route::get('/cadastro_vacina', function () {
        return view('cadastroVacina');
    });

    Route::post('/vacina/save', [App\Http\Controllers\VacinaController::class, 'store']);

    Route::get('/vacinas', [App\Http\Controllers\VacinaController::class, 'index']);

    Route::get('/vacina/registro/{pet}', [App\Http\Controllers\AtendimentoController::class, 'index']);

    Route::post('/vacina/registro/save', [App\Http\Controllers\AtendimentoController::class, 'store']);

    Route::get('/cartao/vacina/{pet}', [App\Http\Controllers\AtendimentoController::class, 'cartaoVacina']);

    Route::get('/edit/pet/{pet}', [App\Http\Controllers\PetController::class, 'editPet']);

    Route::post('/edit/pet/save/{pet}', [App\Http\Controllers\PetController::class, 'updatePet'])->name('edit.pet.save');

    

    










});