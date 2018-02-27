<div class="container">
    <h1>Proyectos Preaprobados</h1>
   <table class="table" id="propuestas">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto )
            <tr>
                <td>{{$proyecto->nombre_proyecto}}</td>
                <td>{{$proyecto->descripcion_proyecto}}</td>
                <td>{{$proyecto->activo}}</td>
            </tr>
        @endforeach
    </tbody>
   </table> 
</div>