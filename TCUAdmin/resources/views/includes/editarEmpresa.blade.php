<div class="col-md-6">
        <h3>Editar Datos de la Empresa</h3>
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
        <form action="{{route('guardarEmpresa')}}" method="post">
            <div class="form-group">
                <label for="nombre_empresa">Nombre Empresa:</label>
                <input class="form-control" maxlength="255" type="text" name="nombre_empresa" value="{{$empresa->nombre_empresa}}">
            </div>
            <div class="form-group">
                <label for="cedula_juridica">Cédula Jurídica:</label>
                <input class="form-control" maxlength="255" type="text" name="cedula_juridica" value="{{$empresa->cedula_juridica}}">
            </div>
            <div class="form-group">
                <label for="nombre_supervisor">Nombre Supervisor:</label>
                <input class="form-control" maxlength="255" type="text" name="nombre_supervisor" value="{{$empresa->nombre_supervisor}}">
            </div>
            <div class="form-group">
                <label for="primer_apellido_supervisor">Primer Apellido Supervisor:</label>
                <input class="form-control" maxlength="255" type="text" name="primer_apellido_supervisor" value="{{$empresa->primer_apellido_supervisor}}">
            </div>
            <div class="form-group">
                <label for="segundo_apellido_supervisor">Segundo Apellido Supervisor:</label>
                <input class="form-control" maxlength="255" type="text" name="segundo_apellido_supervisor" value="{{$empresa->segundo_apellido_supervisor}}">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input class="form-control" maxlength="255" type="text" name="telefono" value="{{$empresa->telefono}}">
            </div>
            <div class="form-group">
                <label for="email">Correo Supervisor:</label>
                <input class="form-control" maxlength="255" type="email" name="correo_supervisor" value="{{$empresa->correo_supervisor}}">
            </div>
            <input name="id" type="hidden" value="{{$empresa->id}}">
            <button type="Submit" class="btn btn-success">Editar Empresa</button>
            {{ csrf_field() }}
        </form>
    </div>