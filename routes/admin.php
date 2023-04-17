<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeCrontroller;
use App\Http\Controllers\Admin\PedidosController;

Route::get('home',[HomeCrontroller::class, 'index'])->name('admin.home');
Route::resource('pedidos' , PedidosController::class)->names('admin.pedidos');