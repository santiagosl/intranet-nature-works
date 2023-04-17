<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;

Route::get('/',[PedidosController::class, 'index'])->name('pedidos.index');
Route::get('/{pedido}',[PedidosController::class, 'show'])->name('pedidos.show');
Route::post('/pdf',[PdfController::class, 'create'])->name('pdf.index');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    });
