<div class="card w-25">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.users.store' ,  'files' => true]) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}    
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Indica un nombre de usuario']) !!}
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>      
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Indica un correo']) !!}

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña mínima de 6 caracteres']) !!}

                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            {!! Form::label('name_role', 'Permisos') !!}
            <div class="form-group">
                {!! Form::radio('name_role', '1') !!}
                Administrador
            </div>

            <div class="form-group">
                {!! Form::radio('name_role', '2', true) !!}
                Comercial
            </div>

            {!! Form::submit('Crear pedido', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>