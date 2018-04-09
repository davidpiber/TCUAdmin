<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TCU ADMIN</title>  
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/dataTables.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/toastr.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div>
        @include('includes.header')
            @yield('content')
        </div>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <script src="{{ URL::asset('js/dataTables.js') }}"></script>
        <script src="{{ URL::asset('js/toastr.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('#propuestas').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/proyectos",
                    "columns": [
                        { data: 'id'},
                        { data: 'nombre_proyecto' },
                        { data: 'descripcion_proyecto' },
                        { data: 'activo' }
                    ]
                });
            });
        </script>
        @if(session()->has('success'))
            <script>toastr.success("{{session('success')}}")</script>
        @endif
        @if(session()->has('error'))
        <script>toastr.error("{{session('error')}}")</script>
        @endif
        @if(session()->has('warning'))
        <script>toastr.warning("{{session('warning')}}")</script>
        @endif
    </body>
</html>
