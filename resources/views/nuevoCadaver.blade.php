@extends('layouts.app')

@section('header')
<h1>
    <a href="{{route('cadaveres')}}"><</a>
</h1>
@endsection

@section('content')
<form action="{{ url('/cadaver/nuevo') }}" method="POST" class="form-horizontal">
    <div class="container nuevo-cadaver">
        {{ csrf_field() }}
        <div class="field">
            <label for="titulo" class="control-label">titulo</label>
            <br/>
            <span class="blink typed-cursor marca pull-left">></span>
            <input type="text" name="titulo" id="cadaver-titulo" class="discrete"/>
        </div>
        <div class="field">
            <label for="llave" class="control-label">llave</label>
            <br/>
            <span class="blink typed-cursor marca">></span>
            <input type="text" name="llave" id="cadaver-llave" class="discrete"/>
        </div>
        <div class="field">
            <label for="llave" class="control-label">personajes</label>
            <br/>
            <span class="blink typed-cursor marca pull-left">></span>
            <textarea placeholder="separa los nombres de usuario con comas" name="personajes" id="cadaver-llave" class="discrete col-xs-11"></textarea>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="flechiboton">
            +
        </button>
    </div>
</form>

@endsection
