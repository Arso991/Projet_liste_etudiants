<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
    
    @yield('content')
    
</body>
</html>