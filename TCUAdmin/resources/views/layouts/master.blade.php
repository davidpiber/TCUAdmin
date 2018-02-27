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
    </head>
    <body>
        <div class ="container-fluid">
        @include('includes.header')
            @yield('content')
        </div>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <script src="{{ URL::asset('js/dataTables.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('#propuestas').DataTable();
            });
        </script>
    </body>
</html>
