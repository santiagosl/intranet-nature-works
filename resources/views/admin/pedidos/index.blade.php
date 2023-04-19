@extends('adminlte::page')

@section('title', 'Nature Works - Pedidos')

@section('content_header')
    <h1>Listado de pedidos</h1>
@stop

@livewireScripts

@section('content')
    @livewire('admin.pedidos-index')
    @livewireScripts
@stop

@section('js')
   
@stop