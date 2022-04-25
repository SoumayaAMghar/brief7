<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [HomeController::class, 'index']);

Route::get('/',[TicketController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::delete('/users/{id}',[UserController::class, 'destroy'])->middleware(['auth'])->name('delete');
Route::get('/users',[UserController::class, 'getUsers'])->middleware(['auth'])->name('users');
Route::get('/tickets',[TicketController::class, 'index'])->middleware(['auth'])->name('index');
Route::get('/tickets/add', [TicketController::class, 'create'])->name('addTicket')->middleware('auth');
Route::post('/tickets', [TicketController::class, 'store'])->name('storeTicket')->middleware('auth');

require __DIR__.'/auth.php';
