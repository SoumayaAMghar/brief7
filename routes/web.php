<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
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



Route::get('/',[TicketController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::delete('/users/{id}',[UserController::class, 'destroy'])->middleware(['auth'])->name('delete');
Route::get('/users',[UserController::class, 'getUsers'])->middleware(['auth'])->name('users');

Route::get('/tickets',[TicketController::class, 'index'])->middleware(['auth'])->name('index');

Route::get('/tickets/{id}',[ResponseController::class, 'getResponses'])->middleware(['auth'])->name('getResponse');

Route::get('/creat-tickets', [TicketController::class, 'create'])->middleware('auth')->name('addTicket');
Route::post('/tickets', [TicketController::class, 'store'])->name('storeTicket')->middleware('auth');


Route::post('/responses', [ResponseController::class, 'index'])->name('responses')->middleware('auth');
Route::post('/response', [ResponseController::class, 'store'])->middleware('auth')->name('addReply');

Route::post('/close_ticket', [TicketController::class, 'close'])->middleware(['auth'])->name('close_ticket');

// Route::get('/close_ticket/{ticket_id}', [TicketsController::class, 'close'])->middleware(['auth'])->name('close_ticket');
// Route::post('/open_ticket/{ticket_id}', [TicketsController::class, 'open'])->middleware(['auth'])->name('open_ticket');


require __DIR__.'/auth.php';
