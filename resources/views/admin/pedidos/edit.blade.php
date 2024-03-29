@extends('adminlte::page')

@section('title', 'Nature Works')

@section('content_header')
    <h1>Editar pedido con id - {{$pedido->id}}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card w-full">
        <div class="card-body">
            {!! Form::model($pedido,['route' => ['admin.pedidos.update', $pedido], 'method' => 'PUT' , 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-row">
                        <div class="col card mr-1">
                            <div class="card-body">
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
                                    {!! Form::label('agregar_documento', 'Agregar nuevo documento al pedido') !!}
                                    {!! Form::file('pdf_1', null,  ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::label('status_pedidos', 'Status del pedido') !!}
                                <div class="form-group">
                                    {!! Form::radio('status', 'Borrador', true ,['id' => 'borrador']) !!}
                                    {!! Form::label('borrador', 'Pedido pendiente(no se mostrará en el resumen)') !!}
                                    
                                </div>
                
                                <div class="form-group">
                                    {!! Form::radio('status', 'Listo', false, ['id' => 'listo']) !!}
                                    {!! Form::label('listo', 'Pedido listo para preparar') !!}
                                </div>
                                                
                                <div class="form-group">
                                    {!! Form::radio('status', 'Finalizado', false, ['id' => 'finalizado']) !!}
                                    {!! Form::label('finalizado', 'Pedido finalizado') !!}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::submit('Actualizar pedido', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

            @if ($pdfs->count())
                {!! Form::label('eliminar_documento', 'Eliminar documentos' , ['class' => 'mt-3']) !!}
                @foreach ($pdfs as $pdf)
                    {!! Form::model($pdf,['route' => ['admin.pedidos.delete', $pdf, $pedido], 'method' => 'PUT']) !!}
                    {!! Form::hidden('id', $pdf->id) !!}
                    {!! Form::hidden('idPedido', $pedido->id) !!}
                    {!! Form::submit('Eliminar' , ['class' => 'btn btn-danger mt-1']) !!} - {{$pdf->url}}
                    {!! Form::close() !!}
                @endforeach
            @endif

        </div>
    </div>
@stop

