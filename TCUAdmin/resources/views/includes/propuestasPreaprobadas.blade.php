<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Horarios</th>
          </tr>
        </thead>
        <tbody>
            @if (count($proyectosPreaprobados) > 0)
                @foreach ($proyectosPreaprobados as $proyecto)
                    <tr>
                        <td>{{$proyecto->nombre_proyecto}}</td>
                        <td>{{$proyecto->descripcion_proyecto}}</td>
                        <td><button class="btn btn-success">Horarios</button></td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>