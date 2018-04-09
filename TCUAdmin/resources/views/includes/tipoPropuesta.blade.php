<div class="col-md-6">
    <h3>Seleccione el Tipo de Propuesta</h3>
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
    <form action="{{route('tipoPropuesta')}}" method="post">
        <div class="form-group">
            <label for="preaprobada">Tipo Propuesta:</label>
            <select name="preaprobada" class="form-control">
                <option value="true">Pre Aprobada</option>
                <option value="false">Empresa</option>
            </select>
        </div>
        <button type="Submit" class="btn btn-success">Seleccionar Propuesta</button>
        {{ csrf_field() }}
    </form>
</div>