<div class="col-md-6">
    <h3>Enviar Mensaje a - {{$usuario->nombre}} {{$usuario->primer_apellido}}</h3>
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
        <form action="{{route('registrarMensaje')}}" method="post">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input class="form-control" type="text" name="titulo" value={{Request::old('titulo')}}>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="descripcion">{{Request::old('descripcion')}}</textarea>
            </div>
            <input name="id_usuario" type="hidden" value="{{$usuario->id}}">
            <input name="id_usuario_envia" type="hidden" value="{{Auth::user()->id}}">
            <button type="Submit" class="btn btn-success">Enviar Mensaje</button>
            {{ csrf_field() }}
        </form>
    </div>