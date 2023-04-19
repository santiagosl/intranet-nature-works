@extends('adminlte::page')

@section('title', 'Nature Works - Crear Pedidos')

@section('content_header')
    <h1>Crear pedido</h1>
@stop

@section('content')
    <div class="card w-full">
        <div class="card-body">
        {!! Form::open(['route' => 'admin.pedidos.store' ,  'files' => true]) !!}
            {!! Form::hidden('user_id', auth()->user()->id) !!}
                <div class="form-row">
                    <div class="col card mr-1">
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('fecha_creacion', 'Fecha*') !!}
                                {!! Form::date('fecha_creacion', null,  ['class' => 'form-control']) !!}
            
                                @error('fecha_creacion')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
            
                            </div>
                           
                            <div class="form-group">
                                {!! Form::label('referencia', 'Referencia*') !!}
                                {!! Form::text('referencia', null, ['class' => 'form-control', 'placeholder' => 'Indica una referencia']) !!}
                                @error('referencia')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
            
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('n_albaran', 'Número de albarán*') !!}
                                {!! Form::text('n_albaran', null, ['class' => 'form-control', 'placeholder' => 'Indica un albarán']) !!}
                                @error('n_albaran')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('obseraciones', 'Notas') !!}
                                {!! Form::text('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Indica alguna observación si es necesario']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col card mr-1">
                        <div class="card-body">
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
                            
                        </div>
                    </div>

                    <div class="col card mr-1">
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('pdf_1', 'Documento 1') !!}
                                {!! Form::file('pdf_1', null,  ['class' => 'form-control-file']) !!}
                            </div>
            
                            <div class="form-group">
                                {!! Form::label('pdf_2', 'Documento 2') !!}
                                {!! Form::file('pdf_2', null,  ['class' => 'form-control']) !!}
                            </div>
            
                            {!! Form::label('status', 'Estado del pedido') !!}
                            <div class="form-group">
                                {!! Form::radio('status', 'Borrador', true) !!}
                                Pedido pendiente(no se mostrará en el resumen)
                            </div>
            
                            <div class="form-group">
                                {!! Form::radio('status', 'Listo') !!}
                                Pedido listo para preparar
                            </div>
                            <div class="form-group">
                                {!! Form::radio('status', 'Finalizado') !!}
                                Pedido finalizado
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::submit('Crear pedido', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
        <div class="form-group mt-3">
            <p>(*) Campos obligatorios</p>
        </div>
       
    </div>
</div>
@stop

