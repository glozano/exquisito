@extends('layouts.app')

@section('header')
<h1>{{$cadaver->titulo}}</h1>
@endsection

@section('content')
    <div class="wrapper center container">
        @if ($ultimoHueso)
        <div class="wrapper center container">
            <div id="mi-ultimo-hueso">
                <p class="subtitle">Mi ultimo hueso:</p>
                <div class="texto" style="visibility:hidden"><p>{{$ultimoHueso->texto}}</p></div>
                <p class="tipeo"></p>
            </div>

            <div id="estimulo">
                <p class="subtitle">Estimulo:</p>
                <p>{{$estimulo->texto}}</p>
            </div>
        </div>
        @endif
    </div>
    <br/>
    <br/>
    <br/>
    <div class="invitacion">
        <form action="{{ url('hueso') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="texto">
                <p>
                    <label>Texto</label>
                </p>
                <p>
                    <input style="display: none" name="cadaver" value="{{$cadaver->id}}"/>
                    <span class="blink typed-cursor marca">></span>
                    <input type="text" name="texto" id="hueso-texto" class="form-control"/>
                </p>
            </div>
            <div class="texto">
                <p>
                    <label>Estimulo</label>
                </p>
                <p>
                    <span class="blink typed-cursor marca">></span>
                    <input type="text" name="estimulo" id="hueso-estimulo" class="form-control"/>
                </p>
            </div>
            <button type="submit" class="btn btn-default">
                <span class="">Doblar</span>
            </button>
        </form>
    </div>
</body>

<div class="llave-wrapper" style="display: none">
    <form action="{{route('escena',$cadaver->id)}}">
        <input type="text" placeholder="llave" name="llave"/>
        <button type="submit">abrir</button>
    </form>
</div>

<script type="text/javascript">
    $('#ver-escena-boton').click(function(){
        $('.llave-wrapper').toggle();
    });
    $("#mi-ultimo-hueso .tipeo").typed({
        stringsElement: $('#mi-ultimo-hueso .texto'),
        typeSpeed: 0.1,
        showCursor: false
    });
</script>

@endsection