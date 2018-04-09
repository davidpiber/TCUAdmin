<div class="col-md-6">
    <h3>Ingresar Propuesta</h3>
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
    <form enctype= "multipart/form-data" action="{{route('ingresarPropuesta')}}" method="post">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value={{Request::old('titulo')}}>
        </div>
        <div class="form-group">
            <label for="titulo">Subir archivo de Propuesta:</label>
            <input class="form-control" type="file" name="propuesta">
        </div>
        <button type="Submit" class="btn btn-success">Subir Propuesta Empresa</button>
        {{ csrf_field() }}
    </form>
</div>