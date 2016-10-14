<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Special+Elite" rel="stylesheet">
    <title>exquisito</title>
</head>

<body>
    <h1>cadaveres</h1>
    <div class="wrapper center container">
        @foreach ($cadaveres as $cadaver)
        <p class="text">
            <a href="{{ route('cadaver', $cadaver->id ) }}">{{$cadaver->titulo}}</a>
        </p>
        @endforeach
    </div>
    </br>
    </br>
    </br>
    </br>
    </br>
    <div class="wrapper center container">
        <a href="{{ url('titulo') }}">comenzar nuevo</a>
    </div>
</body>
</html>