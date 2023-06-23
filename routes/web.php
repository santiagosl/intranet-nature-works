<?php

use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;

Route::get('/',         [PedidosController::class, 'index'])->middleware('auth')->name('pedidos.index');
Route::get('/{pedido}', [PedidosController::class, 'show'])->name('pedidos.show');
Route::put('/{pedido}', [PedidosController::class, 'update'])->name('pedidos.update');
Route::post('/pdf',     [PdfController::class, 'create'])->name('pdf.index');
Route::post('/imagen',  [ImagenesController::class, 'upload'])->name('imagen.upload');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    });
