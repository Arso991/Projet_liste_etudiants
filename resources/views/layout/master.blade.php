<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary box-shadow">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <a class="navbar-brand d-block" href="/" >
                    <img src="{{ asset('img/logo.png') }}" alt="" class="rounded">    
                </a>
            </div>
        </nav>
    </header>
    <div class="mt-1 me-2 d-flex justify-content-md-end">
        <a href="{{ route('signout') }}" class="btn btn-danger ms-2">Deconnecter</a>
    </div>
    
    @yield('content')
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>