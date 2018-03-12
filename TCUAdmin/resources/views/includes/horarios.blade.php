<div class="container">
    <h1>Horarios</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Proyecto</th>
            <th scope="col">Cantidad Instructores</th>
            <th scope="col">Horario</th>
          </tr>
        </thead>
        <tbody>
            @if($horarios && count($horarios) > 0)
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{$horario->id_proyecto}}</td>
                        <td>{{$horario->cantidad_instructores}}</td>
                        <td>{{$horario->horario}}</td>
                    </tr>  
                @endforeach
            @endif
          <tr>
          </tr>
        </tbody>
      </table>
</div>