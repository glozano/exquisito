@extends('layouts.app')

@section('header')
<h1>cadaveres</h1>
@endsection

@section('content')
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
@endsection