<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('todos', TodoController::class);
Route::post('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
