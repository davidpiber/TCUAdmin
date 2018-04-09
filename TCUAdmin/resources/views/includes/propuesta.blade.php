<div class="col-md-7">
        <h3>Propuesta - {{$propuesta->titulo}}</h3>
            <div class="form-group">
                <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value="{{$propuesta->titulo}}" disabled>
            </div>
         
        <div class="form-group">
                <label for="horario">Descargar Propuesta: {{$propuesta->nombre_propuesta}}</label>
                <a class="btn btn-info" href="{{Storage::url($propuesta->nombre_propuesta)}}" download="{{Storage::url($propuesta->nombre_propuesta)}}">
                        <span class="glyphicon glyphicon-download"></span>Descargar
                </a>  
        </div>
</div>