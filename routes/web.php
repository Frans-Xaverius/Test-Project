<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::prefix('main')->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('main.index');
    Route::get('/create', [MainController::class, 'create'])->name('main.create');
    Route::get('/{mahasiswa}/edit', [MainController::class, 'edit'])->name('main.edit');
    Route::post('/store', [MainController::class, 'store'])->name('main.store');
    Route::put('/{mahasiswa}', [MainController::class, 'update'])->name('main.update');
    Route::delete('/{id}', [MainController::class, 'destroy'])->name('main.destroy');
});

// Route::get('', [MainController::class, 'index'])->name('main.index');
