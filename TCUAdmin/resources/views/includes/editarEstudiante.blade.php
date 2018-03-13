<div class="col-md-6">
    <h3>Editar Estudiante</h3>
    <div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{route('guardarEstudiante')}}" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
        <input class="form-control" type="text" name="nombre" value="{{$estudiante->nombre}}">
        </div>
        <div class="form-group">
            <label for="nombre">Primer Apellido:</label>
            <input class="form-control" type="text" name="primer_apellido" value="{{$estudiante->primer_apellido}}">
        </div>
        <div class="form-group">
            <label for="nombre">Segundo Apellido:</label>
            <input class="form-control" type="text" name="segundo_apellido" value="{{$estudiante->segundo_apellido}}">
        </div>
        <div class="form-group">
            <label for="nombre">Cedula:</label>
            <input class="form-control" type="text" name="cedula" value="{{$estudiante->cedula}}">
        </div>
        <div class="form-group">
            <label for="nombre">Carnet Universidad:</label>
            <input class="form-control" type="text" name="carnet_universidad" value="{{$estudiante->carnet_universidad}}">
        </div>
        <div class="form-group">
            <label for="nombre">Correo Universidad:</label>
            <input class="form-control" type="email" name="correo_universidad" value="{{$estudiante->correo_universidad}}">
        </div>
        <div class="form-group">
            <label for="email">Correo Personal:</label>
            <input class="form-control" type="email" name="correo_personal" value="{{$estudiante->correo_personal}}">
        </div>
        <div class="form-group">
            <label for="genero">Genero:</label>
            <select name="genero" class="form-control">
                @if($estudiante->genero == 'masculino')
                    <option value="masculino" selected>Masculino</option>
                    @else
                    <option value="masculino">Masculino</option>
                @endif
                @if($estudiante->genero == 'femenino')
                    <option value="femenino" selected>Femenino</option>
                @else
                    <option value="femenino">Femenino</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="sede">Sede:</label>
            <select name="sede" class="form-control">
                <option value="heredia">Heredia</option>
                <option value="san_pedro">San Pedro</option>
            </select>
        </div>

        <div class="form-group">
                <label for="is_admin">Admin:</label>
                <select name="is_admin" class="form-control">
                    @if($estudiante->admin)
                        <option value="true" selected>Admin</option>
                    @else
                        <option value="true">Admin</option>
                    @endif
                    @if(!$estudiante->admin)
                        <option value="false" selected>Usuario</option>
                    @else
                        <option value="false">Usuario</option>
                    @endif
                </select>
        </div>
        <div class="form-group">
            <label for="reset_password">Reset Password:</label>
            <select name="reset_password" class="form-control">
                <option value="false">No</option>
                <option value="true">Si</option>
            </select>
        </div>
        <input name="id_estudiante" type="hidden" value="{{$estudiante->id}}">
        <button type="Submit" class="btn btn-primary">Registrar</button>
        {{ csrf_field() }}
    </form>
</div>