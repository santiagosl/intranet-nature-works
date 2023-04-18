<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeCrontroller;
use App\Http\Controllers\Admin\PedidosController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\RoleController;

Route::get('home',[HomeCrontroller::class, 'index'])->name('admin.home');
Route::resource('users' , Usercontroller::class)->only(['index', 'edit' , 'update' , 'create' , 'destroy', 'store'])->names('admin.users');
Route::resource('roles' , RoleController::class)->names('admin.roles');
Route::resource('pedidos' , PedidosController::class)->names('admin.pedidos');