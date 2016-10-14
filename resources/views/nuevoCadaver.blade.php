<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Special+Elite" rel="stylesheet">
    <title>exquisito</title>
</head>

<body>
    <a href="{{route('cadaveres')}}"><</a>
    <br/>
    <br/>
    <br/>
    <form action="{{ url('/cadaver/nuevo') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="texto">
            <span> titulo: </span>
            <input type="text" name="titulo" id="cadaver-titulo" class="form-control"/>
            <span> llave: </span>
            <input type="text" name="llave" id="cadaver-titulo" class="form-control"/>
        </div>
        <br/>
        <button type="submit" class="btn btn-default">
            <span class="">Crear</span>
        </button>
    </form>
</body>
</html>