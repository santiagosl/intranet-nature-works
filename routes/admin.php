<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeCrontroller;
use App\Http\Controllers\Admin\PedidosController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\RoleController;

Route::get(     'home',     [HomeCrontroller::class, 'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('users' ,   Usercontroller::class)->middleware('can:admin.home')->only(['index', 'edit' , 'update' , 'create' , 'destroy', 'store' , 'delete'])->names('admin.users');
Route::resource('roles' ,   RoleController::class)->middleware('can:admin.home')->names('admin.roles');
Route::resource('pedidos' , PedidosController::class)->middleware('can:admin.home')->names('admin.pedidos');
Route::put(     'pdf',      [PedidosController::class, 'delete'])->middleware('can:admin.home')->name('admin.pedidos.delete');