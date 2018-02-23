<div class="col-md-6">
    <h3>Ingresar Propuesta</h3>
    @if (count($errors) > 0)
        <div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <form action="{{route('ingresarPropuesta')}}" method="post">
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value={{Request::old('titulo')}}>
        </div>
        <div class="form-group">
            <label for="justificacion">Justificación:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="justificacion" value={{Request::old('justificacion')}}></textarea>
        </div>
        <div class="form-group">
            <label for="descripcion_beneficiarios">Descripción Beneficiarios:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="descripcion_beneficiarios" value={{Request::old('descripcion_beneficiarios')}}></textarea>
        </div>
        <div class="form-group">
            <label for="objetivo_general">Objetivo General:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="objetivo_general" value={{Request::old('objetivo_general')}}></textarea>
        </div>
        <div class="form-group">
            <label for="estrategia_trabajo">Estrategia Trabajo:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="estrategia_trabajo" value={{Request::old('estrategia_trabajo')}}></textarea>
        </div>
        <div class="form-group">
            <label for="recursos_necesarios">Recursos Necesarios:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="recursos_necesarios" value={{Request::old('recursos_necesarios')}}></textarea>
        </div>
        <div class="form-group">
            <label for="pertenencia_solucion">Pertenencia Solución:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="pertenencia_solucion" value={{Request::old('pertenencia_solucion')}}></textarea>
        </div>
        <div class="form-group">
            <label for="resultados_esperados">Resultados Esperados:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="resultados_esperados" value={{Request::old('resultados_esperados')}}></textarea>
        </div>
        <div class="form-group">
            <label for="cronograma">Cronograma:</label>
            <textarea class="form-control" rows="5" maxlength="255" name="cronograma" value={{Request::old('cronograma')}}></textarea>
        </div>
        <div class="form-group">
            <label for="preaprobada">Tipo Propuesta:</label>
            <select name="preaprobada" class="form-control">
                <option value="true">Preaprobada</option>
                <option value="false">Empresa</option>
            </select>
        </div>
        <input name="id_usuario" type="hidden" value="{{Auth::user()->id}}">
        <button type="Submit" class="btn btn-primary">Registrar Propuesta</button>
        {{ csrf_field() }}
    </form>
</div>