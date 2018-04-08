<div class="col-md-6">
        <h3>Propuesta - {{$propuesta->titulo}}</h3>
            <div class="form-group">
                <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" maxlength="255" name="titulo" value="{{$propuesta->titulo}}" disabled>
            <td>
                    <a class="btn btn-success" href="{{Storage::url($propuesta->nombre_propuesta)}}" download="{{Storage::url($propuesta->nombre_propuesta)}}">
                            Descargar
                        </button>
                    </a>
            </td>    
</div>