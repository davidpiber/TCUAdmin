<div class="col-md-6">
    <h3>Ingresar Propuesta</h3>
    <form enctype= "multipart/form-data" action="{{route('ingresarPropuesta')}}" method="post">
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value={{Request::old('titulo')}}>
        </div>
        <div class="form-group">
            <label for="titulo">Subir archivo de Propuesta:</label>
            <input class="form-control" type="file" name="propuesta">
        </div>
        <input name="id_usuario" type="hidden" value="{{Auth::user()->id}}">
        <button type="Submit" class="btn btn-success">Subir Propuesta</button>
        {{ csrf_field() }}
    </form>
</div>