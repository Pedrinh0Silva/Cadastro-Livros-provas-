<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::resource('livros', LivroController::class);

Route::get('/', function () {
    return redirect()->route('livros.index');
});