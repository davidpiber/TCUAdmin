<div class="col-md-6">
    <h3>Ingresar Propuesta con Comentarios</h3>
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
    <form enctype= "multipart/form-data" action="{{route('reprobarPropuestaGuardar')}}" method="post">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value="{{$propuesta->titulo}}">
        </div>
        <div class="form-group">
            <label for="titulo">Subir Archivo de Propuesta con Comentarios:</label>
            <input class="form-control" type="file" name="propuesta">
        </div>
        <input name="id" type="hidden" value="{{$propuesta->id}}">
        <button type="Submit" class="btn btn-success">Subir Archivo</button>
        {{ csrf_field() }}
    </form>
</div>