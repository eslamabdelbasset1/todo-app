<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::resource('todos', TodoController::class);
    Route::post('/todos/{todo}/complete', [TodoController::class, 'complete'])
        ->name('todos.complete');
    Route::get('/home', [App\Http\Controllers\TodoController::class, 'index'])->name('home');

});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

