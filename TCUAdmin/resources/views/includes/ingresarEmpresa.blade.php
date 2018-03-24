<div class="col-md-6">
    <h3>Ingrese los Datos de la Empresa</h3>
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
    <form action="{{route('ingresarEmpresa')}}" method="post">
        <div class="form-group">
            <label for="nombre_empresa">Nombre Empresa:</label>
            <input class="form-control" type="text" name="nombre_empresa" value={{Request::old('nombre_empresa')}}>
        </div>
        <div class="form-group">
            <label for="cedula_juridica">Cedula Jurídica:</label>
            <input class="form-control" type="text" name="cedula_juridica" value={{Request::old('cedula_juridica')}}>
        </div>
        <div class="form-group">
            <label for="nombre_supervisor">Nombre Supervisor:</label>
            <input class="form-control" type="text" name="nombre_supervisor" value={{Request::old('nombre_supervisor')}}>
        </div>
        <div class="form-group">
            <label for="primer_apellido_supervisor">Primer Apellido Supervisor:</label>
            <input class="form-control" type="text" name="primer_apellido_supervisor" value={{Request::old('primer_apellido_supervisor')}}>
        </div>
        <div class="form-group">
            <label for="segundo_apellido_supervisor">Segundo Apellido Supervisor::</label>
            <input class="form-control" type="text" name="segundo_apellido_supervisor" value={{Request::old('segundo_apellido_supervisor')}}>
        </div>
        <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input class="form-control" type="text" name="telefono" value={{Request::old('telefono')}}>
        </div>
        <div class="form-group">
            <label for="email">Correo Supervisor:</label>
            <input class="form-control" type="email" name="correo_supervisor" value={{Request::old('correo_supervisor')}}>
        </div>
        <button type="Submit" class="btn btn-success">Registrar Empresa</button>
        {{ csrf_field() }}
    </form>
</div>