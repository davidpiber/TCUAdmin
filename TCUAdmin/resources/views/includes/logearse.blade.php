
<div class="col-md-6">
    <h3>Log In</h3>
    <form action="{{ route('login') }}" method="post">
        <div class="form-group">
            <label for="email">Correo Personal:</label>
            <input class="form-control" name="email" type="email">
        </div>
        <div class="form-group">
            <label for="nombre">Password:</label>
            <input class="form-control" type="password" name="password">
        </div>
        <button type="Submit" class="btn btn-primary">Entrar</button>
        {{ csrf_field() }}
    </form>
</div>