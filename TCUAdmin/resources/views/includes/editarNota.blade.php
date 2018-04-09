<div class="col-md-6">
        <h3>Editar Nota</h3>
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
        <form action="{{route('editarNota')}}" method="post">
            <div class="form-group">
                <label for="nota">Nota:</label>
                <input class="form-control" type="text" name="nota" value="{{$nota->nota}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input class="form-control" type="text" name="descripcion" value="{{$nota->descripcion}}">
            </div>
            <div class="form-group">
                <label for="proyecto_preaprobado">Proyectos Pre Aaprobados:</label>
                <select name="proyecto_preaprobado" class="form-control">
                    @foreach($proyectosPreaprobados as $proyecto)
                        <option value="{{$proyecto->id}}">{{$proyecto->nombre_proyecto}}</option>
                    @endforeach
                </select>
            </div>
            <input name="id_nota" type="hidden" value="{{$nota->id}}">
            <button type="Submit" class="btn btn-success">Guardar Nota</button>
            {{ csrf_field() }}
        </form>
    </div>