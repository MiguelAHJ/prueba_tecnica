<?php

use App\Http\Controllers\CarrosController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'check.age'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified', 'check.age'])->group(function () {
    Route::controller(CarrosController::class)->group(function () {
        Route::get('/carros/edit/{carro:id_carro}', 'edit')->name('carros.edit');
        Route::get('/carros/create', 'create')->name('carros.create');
    });
});

require __DIR__.'/auth.php';
