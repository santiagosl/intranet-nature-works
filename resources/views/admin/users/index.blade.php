@extends('adminlte::page')

@section('title', 'Nature Works - Lista Usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('admin.user-index')
    @livewireScripts
@stop

@section('css')
{{--     <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop