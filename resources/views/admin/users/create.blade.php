@extends('adminlte::page')

@section('title', 'Nature Works')

@section('content_header')
    <h1>Crear un nuevo usuario</h1>
@stop

@section('content')
    @livewire('admin.user-create')
    @livewireScripts
@stop

@section('css')
{{--     <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop