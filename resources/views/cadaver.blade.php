@extends('layouts.app')

@section('header')
<h1>
    <a href="{{route('cadaveres')}}"><</a>
</h1>
@endsection

@section('content')

<h1>{{$cadaver->titulo}}</h1>
<form action="{{ url('hueso') }}" method="POST">
    {{ csrf_field() }}
    <div class="container">
        <div class="hueso-viejo">
            @if ($ultimoHueso)
                <div id="mi-ultimo-hueso">
                    <p class="subtitle">Mi ultimo hueso:</p>
                    <div class="texto" style="visibility:hidden"><p>{{$ultimoHueso->texto}}</p></div>
                    <p class="tipeo"></p>
                </div>
            @endif
            @if ($estimulo)
                <div id="estimulo">
                    <p class="subtitle">Su ultimo estimulo:</p>
                    <p>{{$estimulo->texto}}</p>
                </div>
            @endif
        </div>
        @if ($toca)
        <div class="invitacion row">
            <div class="texto col-xs-12">
                <label for="texto" class="control-label">texto</label>
                <br/>
                <span class="blink typed-cursor marca pull-left">></span>
                <textarea name="texto" id="texto" class="discrete col-xs-8"></textarea>
            </div>
            <div class="texto col-xs-12">
                <label for="estimulo" class="control-label">estimulo</label>
                <br/>
                <span class="blink typed-cursor marca pull-left">></span>
                <input type="text" name="estimulo" id="estimulo" class="discrete col-xs-8"/>
            </div>
            <input type="hidden" name="cadaver" value="{{$cadaver->id}}"/>
        </div>
        @endif
        @if (!$toca)
        <div class="invitacion">
            Espero y mientras me preparo para la mudanza
        </div>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="flechiboton">
            <span class="">+</span>
        </button>
    </div>
    <a id="ver-escena" class="iconoboton">
        <span class="glyphicon glyphicon-eye-open"></span>
    </a>
</form>

<form action="{{route('escena',$cadaver->id)}}" id="form-llave">
        <div class="wrapper-clave" style="display: none;"></div>
        <span class="input-clave"></span>
        <input type="text"  placeholder="" class="discrete" name="llave"/>
</form>


<script type="text/javascript">
    $('#ver-escena').click(function(){
        $('.wrapper-clave').toggle();
        $('.input-clave').typed({
            strings:['llave >'],
            showCursor: false
        })
    });
    $("#mi-ultimo-hueso .tipeo").typed({
        stringsElement: $('#mi-ultimo-hueso .texto'),
        typeSpeed: 10,
        showCursor: false
    });
</script>

@endsection