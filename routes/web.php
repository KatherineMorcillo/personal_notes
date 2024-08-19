<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
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

Route::controller(NotesController::class)->group(function () {
    Route::get('/notes', 'index')->name('notes.index');
    Route::get('/notes/create', 'create')->name('notes.create');
    Route::post('/notes/store', 'store')->name('notes.store');
    Route::get('/notes/edit/{id}', 'edit')->name('notes.edit');
    Route::put('/notes/edit/{id}', 'update')->name('notes.update');
    Route::delete('/note/delete/{id}', 'delete')->name('notes.delete');
});
