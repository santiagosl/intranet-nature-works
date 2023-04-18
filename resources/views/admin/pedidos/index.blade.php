@extends('adminlte::page')

@section('title', 'Nature Works')

@section('content_header')
    <h1>Listado de pedidos</h1>
@stop

@livewireScripts

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.pedidos.create')}}">Crear pedido</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Referencia</th>
                        <th>Nº Albarán</th>
                        <th>Notas</th>
                        <th>Material comercial</th>
                        <th>Transporte</th>
                        <th>Recogida</th>
                        <th>Ok Recogida</th>
                        <th>Acción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $item)
                        <tr>
   
                            @if ($item->status == '0')
                                <td class="text-red-600">Borrador</td>
                            @else
                                <td>Listo</td>
                            @endif
                           
                            <td>{{$item->fecha_creacion}}</td>
                            <td>{{$item->referencia}}</td>
                            <td>{{$item->n_albaran}}</td>
                            <td>{{$item->observaciones}}</td>
                            <td>{{$item->material_comercial}}</td>
                            <td>{{$item->transporte}}</td>
                            <td>{{$item->fecha_recogida}}</td>
                            <td>{{$item->confirmacion_recogida}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.pedidos.edit', $item)}}">Editar</a>
                            </td>
                            <td width="10px">
                               <form action="{{route('admin.pedidos.destroy', $item)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
            </table>
        </div>
{{--         <div class="card-footer">
            {{$pedidos->links()}}
        </div> --}}
@stop

@section('js')
   
@stop