<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Test-task</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="container">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="/">Test-task</a>
                    <form class="form-inline" action="search">
                        <input class="form-control mr-sm-2" type="search" aria-label="Search" name="s">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                    </form>
                </nav>
            </div>
        </header>
        @yield('content')
    </div>
</body>
</html>