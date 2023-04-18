@extends('adminlte::page')

@section('title', 'Nature Works')

@section('content_header')
    <h1>Editar pedidos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="flex-auto">
        <div class="flex-1">Contenido columna 1</div>
        <div class="flex-1">Contenido columna 2</div>
      </div>
      
    <div class="card w-50">
        <div class="card-body">
            {!! Form::model($pedido,['route' => ['admin.pedidos.update', $pedido], 'method' => 'PUT' , 'enctype' => 'multipart/form-data']) !!}

                <div class="form-group">
                    {!! Form::label('fecha_creacion', 'Fecha') !!}
                    {!! Form::date('fecha_creacion', null,  ['class' => 'form-control']) !!}
                    @error('fecha_creacion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('referencia', 'Referencia') !!}
                    {!! Form::text('referencia', null, ['class' => 'form-control', 'placeholder' => 'Indica una referencia']) !!}
                    @error('referencia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('n_albaran', 'Número de albarán') !!}
                    {!! Form::text('n_albaran', null, ['class' => 'form-control', 'placeholder' => 'Indica un albarán']) !!}
                    @error('n_albaran')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('obseraciones', 'Notas') !!}
                    {!! Form::text('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Indica alguna observación si es necesario']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('material_comercial', 'Material Comercial') !!}
                    {!! Form::text('material_comercial', null, ['class' => 'form-control', 'placeholder' => 'Indica si requiere material comercial']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('transporte', 'Transporte') !!}
                    {!! Form::text('transporte', null, ['class' => 'form-control', 'placeholder' => 'Indica el transporte']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('fecha_recogida', 'Fecha de recogida') !!}
                    {!! Form::date('fecha_recogida', null,  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('confirmacion_recogida', 'Confirmación de recogida') !!}
                    {!! Form::text('confirmacion_recogida', null, ['class' => 'form-control', 'placeholder' => 'Indica la matrícula del transporte o confirmación de la recogida']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pdf_1', 'Documento 1') !!}
                    {!! Form::file('pdf_1', null,  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('pdf_2', 'Documento 2') !!}
                    {!! Form::file('pdf_2', null,  ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::radio('status', 0, true) !!}
                    Pedido pendiente(no se mostrará en el resumen)
                </div>

                <div class="form-group">
                    {!! Form::radio('status', 1) !!}
                    Pedido listo para preparar
                </div>

                {!! Form::submit('Actualizar pedido', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

