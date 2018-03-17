<div class="container">
    <h1>Mensajes</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha</th>
            <th scope="col">descripcion</th>
            <th scope="col">Administrador</th>
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
                        <td>
                            <a class="btn btn-warning btn-sm" href="/mensaje/{{$mensaje->id}}" role="button">Ver</a>
                        </td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>