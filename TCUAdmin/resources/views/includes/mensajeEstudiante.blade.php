<div class="col-md-6">
    <h3>Enviado por: {{$mensaje->usuarioEnvia->nombre}}</h3>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input disabled class="form-control" type="text" name="titulo" value="{{$mensaje->titulo}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea disabled class="form-control" rows="5" maxlength="255" name="descripcion">{{$mensaje->descripcion}}</textarea>
        </div>
</div>