<div class="col-md-6">
    <h3>Log In</h3>
    <div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('login') }}" method="post">
        <div class="form-group">
            <label for="correo_universidad">Correo Universidad:</label>
            <input class="form-control" name="correo_universidad" type="email" value={{Request::old('correo_universidad')}}>
        </div>
        <div class="form-group">
            <label for="nombre">Password:</label>
            <input class="form-control" type="password" name="password">
        </div>
        <button type="Submit" class="btn btn-success">Entrar</button>
        {{ csrf_field() }}
    </form>
    <a class="btn btn-success register-button" href="/registrar" role="button">Registarse</a>
</div>

