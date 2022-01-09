<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/auth/entrar', [AuthController::class, 'index'])->name('site.auth.entrar');
Route::post('/auth/entrar', [AuthController::class, 'login'])->name('site.auth.login');
Route::get('/auth/sair', [AuthController::class, 'logout'])->name('site.auth.sair');
Route::get('/auth/registrar', [AuthController::class, 'register'])->name('site.auth.registrar');
Route::post('/auth/registrar', [AuthController::class, 'registerUser'])->name('site.auth.register');

Route::get('/perfil', [ProfileController::class, 'index'])->name('site.profile.index');
