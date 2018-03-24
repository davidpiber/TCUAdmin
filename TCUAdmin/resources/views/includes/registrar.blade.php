<div class="col-md-6">
    <h3>Registrarse</h3>
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
    <form action="{{route('registrar')}}" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" value={{Request::old('nombre')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Primer Apellido:</label>
            <input class="form-control" type="text" name="primer_apellido" value={{Request::old('primer_apellido')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Segundo Apellido:</label>
            <input class="form-control" type="text" name="segundo_apellido" value={{Request::old('segundo_apellido')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Cedula:</label>
            <input class="form-control" type="text" name="cedula" value={{Request::old('cedula')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Carnet Universidad:</label>
            <input class="form-control" type="text" name="carnet_universidad" value={{Request::old('carnet_universidad')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Correo Universidad:</label>
            <input class="form-control" type="email" name="correo_universidad" value={{Request::old('correo_universidad')}}>
        </div>
        <div class="form-group">
            <label for="email">Correo Personal:</label>
            <input class="form-control" type="email" name="correo_personal" value={{Request::old('correo_personal')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Password:</label>
            <input class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
            <label for="genero">Genero:</label>
            <select name="genero" class="form-control">
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sede">Sede:</label>
            <select name="sede" class="form-control">
                <option value="heredia">Heredia</option>
                <option value="san_pedro">San Pedro</option>
            </select>
        </div>
        <button type="Submit" class="btn btn-success">Registrar</button>
        {{ csrf_field() }}
    </form>
</div>