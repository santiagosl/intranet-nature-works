<div>
   <div class="card w-50">

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="card-header">
        <input wire:model.lazy="word" type="text"  class="form-control" placeholder="Ingrese el email o correo de un usuario">
    </div>

    @if ($users->count())    
    
        <div class="card-body">
            <table class="table table-stripe">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit' , $user)}}">Editar</a>
                            </td>
                            
                            <td width="10px">
                                @if ($user->id <> '1')
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                 </form>
                                 @endif
                             </td
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
       
    @else
        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
    @endif
   </div>
</div>
