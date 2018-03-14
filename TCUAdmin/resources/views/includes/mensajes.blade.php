<div class="container">
        <h1>Mensajes</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha</th>
                <th scope="col">descripcion</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Administrador</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                @if($mensajes && count($mensajes) > 0)
                    @foreach ($mensajes as $mensaje)
                        <tr>
                            <td>{{$mensaje->titulo}}</td>
                            <td>{{$mensaje->fecha}}</td>
                            <td>{{$mensaje->descripcion}}</td>
                            <td>{{$mensaje->usuario->nombre }}</td>
                            <td>{{$mensaje->usuario_envia->nombre }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/editarMensaje/{{$mensaje->id}}" role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('eliminarMensaje') }}" method="post">
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                    <input name="id_mensaje" type="hidden" value="{{$mensaje->id}}">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>  
                    @endforeach
                @endif
              <tr>
              </tr>
            </tbody>
          </table>
    </div>