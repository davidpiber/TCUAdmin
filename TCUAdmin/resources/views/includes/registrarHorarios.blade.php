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
                            <form action="{{ route('ingresarHorario') }}" method="post">
                                    <button type="submit" class="btn btn-success">Ingresar Horario</button>
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