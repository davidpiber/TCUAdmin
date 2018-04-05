<div class="col-md-6">
    <h3>Ingresar Horario para {{$proyecto->nombre_proyecto}}</h3>
        @if (count($errors) > 0)
            <div>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form action="{{route('registrarHorario')}}" method="post">
            <div class="form-group">
                <label for="horario">Horario:</label>
                <input class="form-control" type="text" maxlength="255" name="horario" value={{Request::old('horario')}}>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input class="form-control" type="text" maxlength="255" name="fecha_inicio" value={{Request::old('fecha_inicio')}}>
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input class="form-control" type="text" maxlength="255" name="ubicacion" value={{Request::old('ubicacion')}}>
            </div>
            <div class="form-group">
                    <label for="cantidad_instructores">Cantidad de Instructores:</label>
                    <input class="form-control" type="number" maxlength="255" name="cantidad_instructores" value={{Request::old('cantidad_instructores')}}>
            </div>
            <input name="id_proyecto" type="hidden" value="{{$proyecto->id}}">
            <button type="Submit" class="btn btn-success">Registrar Horario</button>
            {{ csrf_field() }}
        </form>
    </div>