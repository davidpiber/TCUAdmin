<div class="col-md-6">
        <h3>Editar Horario - {{$proyecto->nombre_proyecto}}</h3>
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
            <form action="{{route('guardarHorario')}}" method="patch">
                <div class="form-group">
                    <label for="horario">Horario:</label>
                    <input class="form-control" type="text" maxlength="255" name="horario" value="{{$horario->horario}}">
                </div>
                <div class="form-group">
                        <label for="cantidad_instructores">Cantidad de Instructores:</label>
                        <input class="form-control" type="number" maxlength="255" name="cantidad_instructores" value={{$horario->cantidad_instructores}}>
                </div>
                <input name="id_horario" type="hidden" value="{{$horario->id}}">
                <button type="Submit" class="btn btn-primary">Editar Horario</button>
                {{ csrf_field() }}
            </form>
</div>