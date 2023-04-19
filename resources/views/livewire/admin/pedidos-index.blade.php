<div class="card">
    @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif

        <div class="card-header">
            <input wire:model.lazy="word" type="text"  class="form-control" placeholder="Buscar por: Estado, Referencia, Nº de albarán">
        </div>
        
        {{--  Boton para crear pedidos
        <div class="card-header">
            <a class="btn btn-secondary" href="{{route('admin.pedidos.create')}}">Crear pedido</a>
        </div> --}}

        @if ($pedidos->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
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
   
                            <td width="5px">{{$item->id}}</td>
                            <td width="10px">{{$item->status}}</td>
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

        <div class="card card-footer">
            {{$pedidos->links()}}
        </div>

        @else

            <div class="card-body">
                <strong>No hay registros</strong>
            </div>

        @endif
</div>

    

