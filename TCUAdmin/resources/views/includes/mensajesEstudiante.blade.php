<div class="container">
    <h1>Mensajes</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">Fecha</th>
            <th scope="col">Descripción</th>
            <th scope="col">Administrador</th>
            <th scope="col">Visto</th>
            <th scope="col">Ver Mensaje</th>
          </tr>
        </thead>
        <tbody>
            @if($mensajes && count($mensajes) > 0)
                @foreach ($mensajes as $mensaje)
                    <tr>
                        <td>{{$mensaje->titulo}}</td>
                        <td>{{$mensaje->fecha}}</td>
                        <td>{{$mensaje->descripcion}}</td>
                        <td>{{$mensaje->usuario_envia->nombre }}</td>
                        <td>{{$mensaje->visto ? 'Visto' : 'Sin Leer'}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/mensaje/{{$mensaje->id}}" role="button">Ver</a>
                        </td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>