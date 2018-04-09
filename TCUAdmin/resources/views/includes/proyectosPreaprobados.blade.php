<div class="container">
        <h1>Proyectos Pre Aprobados</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                @if($proyectos && count($proyectos) > 0)
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->nombre_proyecto}}</td>
                            <td>{{$proyecto->descripcion_proyecto}}</td>
                            <td>{{$proyecto->activo ? "Activo" : "Inactivo" }}
                            <td>
                                <a class="btn btn-warning btn-sm" href="/editarproyecto/{{$proyecto->id}}" role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('eliminarProyecto') }}" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        <input name="id" type="hidden" value="{{$proyecto->id}}">
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