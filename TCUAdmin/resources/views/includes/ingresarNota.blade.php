<div class="col-md-6">
        <h3>Ingresar Nota</h3>
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
        <form action="{{route('guardarNota')}}" method="post">
            <div class="form-group">
                <label for="nota">Nota:</label>
                <input class="form-control" type="text" name="nota" value="{{$usuario->nota}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input class="form-control" type="text" name="descripcion" value="{{$usuario->descripcion}}">
            </div>
            <div class="form-group">
                <label for="proyecto_preaprobado">Proyectos Preaprobados:</label>
                <select name="proyecto_preaprobado" class="form-control">
                    @foreach($proyectosPreaprobados as $proyecto)
                        <option value="{{$proyecto->id}}">{{$proyecto->nombre_proyecto}}</option>
                    @endforeach
                </select>
            </div>
            <input name="id_estudiante" type="hidden" value="{{$usuario->id}}">
            <button type="Submit" class="btn btn-success">Registrar Nota</button>
            {{ csrf_field() }}
        </form>
    </div>