<h1>Proyectos Preaprobados</h1>
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Ingresar Horario</th>
          </tr>
        </thead>
        <tbody>
            @if($proyectos && count($proyectos) > 0)
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{$proyecto->nombre_proyecto}}</td>
                        <td>{{$proyecto->descripcion_proyecto}}</td>
                        <td>
                            <a class="btn btn-success" href="/ingresarHorario/{{$proyecto->id}}" role="button">Ingresar Horario</a>
                        </td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>