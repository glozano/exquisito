<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Special+Elite" rel="stylesheet">
    <title>exquisito</title>
</head>

<body>
    <h1><a href="{{route('cadaveres')}}"><</a></h1>
    <h1>{{$cadaver->titulo}}</h1>
    <div class="wrapper center container">
        @foreach ($huesos as $hueso)
        <p class="text">
            {{$hueso->texto}}</a>
        </p>
        @endforeach
    </div>
</body>
</html>