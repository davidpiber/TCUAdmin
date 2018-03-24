<div class="col-md-6">
        <h3>Propuesta - {{$propuesta->titulo}}</h3>
        <form action="{{route('aprobarPropuesta')}}" method="post">
            <div class="form-group">
                <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value="{{$propuesta->titulo}}" disabled>
            </div>
            <div class="form-group">
                <label for="justificacion">Justificación:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="justificacion" disabled>{{$propuesta->justificacion}}</textarea>
            </div>
            <div class="form-group">
                <label for="descripcion_beneficiarios">Descripción Beneficiarios:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="descripcion_beneficiarios" disabled>{{$propuesta->descripcion_beneficiarios}}</textarea>
            </div>
            <div class="form-group">
                <label for="objetivo_general">Objetivo General:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="objetivo_general" disabled>{{$propuesta->objetivo_general}}</textarea>
            </div>
            <div class="form-group">
                <label for="estrategia_trabajo">Estrategia Trabajo:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="estrategia_trabajo" disabled>{{$propuesta->estrategia_trabajo}}</textarea>
            </div>
            <div class="form-group">
                <label for="recursos_necesarios">Recursos Necesarios:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="recursos_necesarios" disabled>{{$propuesta->recursos_necesarios}}</textarea>
            </div>
            <div class="form-group">
                <label for="pertenencia_solucion">Pertenencia Solución:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="pertenencia_solucion" disabled>{{$propuesta->pertenencia_solucion}}</textarea>
            </div>
            <div class="form-group">
                <label for="resultados_esperados">Resultados Esperados:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="resultados_esperados" disabled>{{$propuesta->resultados_esperados}}</textarea>
            </div>
            <div class="form-group">
                <label for="cronograma">Cronograma:</label>
                <textarea class="form-control" rows="5" maxlength="255" name="cronograma" disabled>{{$propuesta->cronograma}}</textarea>
            </div>
            <input name="id_propuesta" type="hidden" value="{{$propuesta->id}}">
            <button type="Submit" class="btn btn-success">Aprobar Propuesta</button>
            {{ csrf_field() }}
        </form>
</div>