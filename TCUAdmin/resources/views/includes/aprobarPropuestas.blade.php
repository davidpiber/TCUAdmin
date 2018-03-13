<div class="container">
        <h1>Propuestas Estudiantes</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Estado</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Ver Propuesta</th>
              </tr>
            </thead>
            <tbody>
                @if($propuestas && count($propuestas) > 0)
                    @foreach ($propuestas as $propuesta)
                        <tr>
                            <td>{{$propuesta->titulo}}</td>
                            <td>{{$propuesta->activa ? "Activa" : "Inactiva" }}</td>
                            <td>{{$propuesta->estudiante->nombre.' '.$propuesta->estudiante->primer_apellido}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/propuesta/{{$propuesta->id}}" role="button">Ver Propuesta</a>
                            </td>
                        </tr>  
                    @endforeach
                @endif
              <tr>
              </tr>
            </tbody>
          </table>
    </div>