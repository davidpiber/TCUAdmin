<div class="container">
        <h1>Estudiantes</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nombre Empresa</th>
                <th scope="col">Cédula Jurídica</th>
                <th scope="col">Telefono</th>
                <th scope="col">Nombre Supervisor</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
              </tr>
            </thead>
            <tbody>
                @if($empresas && count($empresas) > 0)
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->nombre_empresa}}</td>
                            <td>{{$empresa->cedula_juridica}}</td>
                            <td>{{$empresa->telefono}}</td>
                            <td>{{$empresa->nombre_supervisor}}</td>
                            <td>{{$empresa->primer_apellido_supervisor}}</td>
                            <td>{{$empresa->correo_supervisor}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="/editarEmpresa/{{$empresa->id}}" role="button">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('eliminarEmpresa') }}" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        <input name="id" type="hidden" value="{{$empresa->id}}">
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