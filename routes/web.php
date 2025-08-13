<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Journey;
use App\Http\Controllers\Settings;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/auths', [Auth::class, 'showLoginForm'])->name('login.form');

Route::post('/login', [Auth::class, 'login'])->name('login.submit');

Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboards')
    ->middleware('check.session');

Route::get('/journey', [Journey::class, 'index'])->name('journey')
    ->middleware('check.session');

Route::post('/journey', [Journey::class, 'store'])->name('journey.store');

Route::delete('/journey/{id}', [Journey::class, 'destroy'])->name('journey.delete');

Route::put('/journey/{id}', [Journey::class, 'update'])->name('journey.update');

Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');

Route::get('/ourjourney', [Journey::class, 'ourJourney'])->name('dataJourney');

Route::get('/ourjourney/{id}', [Journey::class, 'getDetail']);

Route::get('/ourjourney/{id}', [Journey::class, 'getDetail']);

Route::get('/journeys', [Journey::class, 'getAll'])->name('journeys.getAll');

Route::post('/send-suggestion', [Journey::class, 'sendSuggestion'])->name('send.suggestion');
