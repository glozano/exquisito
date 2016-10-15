<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Special+Elite" rel="stylesheet">
    <title>exquisito</title>
</head>

<body>


<div class="wrapper center container">
    <div class="hueso-viejo">
        @foreach ($huesos as $hueso)
        <p class="text"><?php echo $hueso->texto ?></p>
        @endforeach
    </div>
    <br/>
    <div class="invitacion">
        <form action="{{ url('hueso') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="texto">
                <span class="blink typed-cursor marca">></span><input type="text" name="texto" id="hueso-texto" class="form-control"/>
            </div>
            <br/>
            <button type="submit" class="btn btn-default">
                <span class="">Doblar</span>
            </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>