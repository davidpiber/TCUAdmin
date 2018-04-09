<div class="container">
    <h1>Proyectos Pre Aprobados Disponibles</h1>
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
                        <td>
                            <form action="{{ route('horariosPropuesta') }}" method="post">
                                    <button type="submit" class="btn btn-success">Horarios</button>
                                    <input name="id_proyecto" type="hidden" value="{{$proyecto->id}}">
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