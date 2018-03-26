<div class="container">
        <h1>Horarios Matriculados</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Estudiante</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Proyecto</th>
                <th scope="col">Horario</th>
              </tr>
            </thead>
            <tbody>
                @if($usuarioHorarios && count($usuarioHorarios) > 0)
                    @foreach ($usuarioHorarios as $usuariohorario)
                        <tr>
                            <td>{{$usuariohorario->usuario->nombre}}</td>
                            <td>{{$usuariohorario->usuario->primer_apellido}}</td>
                            <td>{{$usuariohorario->usuario->segundo_apellido}}</td>
                            <td>{{$usuariohorario->proyecto->nombre_proyecto}}</td>
                            <td>{{$usuariohorario->horario->horario}}</td>
                        </tr>  
                    @endforeach
                @endif
              <tr>
              </tr>
            </tbody>
          </table>
    </div>