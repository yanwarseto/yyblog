<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Dashboard;
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

Route::get('/logout', [Dashboard::class, 'logout'])->name('logout');
