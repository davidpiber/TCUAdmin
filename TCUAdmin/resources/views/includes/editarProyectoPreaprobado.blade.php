<div class="col-md-6">
        <h3>Editar Proyecto Pre Aprobado</h3>
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
        <form action="{{route('guardarProyectoPreaprobado')}}" method="post">
            <div class="form-group">
                <label for="nombre_proyecto">Nombre Proyecto:</label>
            <input class="form-control" type="text" name="nombre_proyecto" value="{{$proyecto->nombre_proyecto}}">
            </div>
            <div class="form-group">
                <label for="descripcion_proyecto">Descripción del Proyecto:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="descripcion_proyecto">{{$proyecto->descripcion_proyecto}}</textarea>
            </div>
            <div class="form-group">
                <label for="activo">Estado Proyecto:</label>
                <select name="activo" class="form-control">
                    <option value="true">Activa</option>
                    <option value="false">Inactiva</option>
                </select>
            </div>
            <input name="id" type="hidden" value="{{$proyecto->id}}">
            <button type="Submit" class="btn btn-success">Guardar Proyecto</button>
            {{ csrf_field() }}
        </form>
    </div>