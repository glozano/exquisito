@extends('layouts.app')

@section('header')
<h1>
    <a href="{{route('cadaveres')}}"><</a>
</h1>
@endsection

@section('content')
<h1>{{$cadaver->titulo}}</h1>
<div class="wrapper center container escena">
    @foreach ($huesos as $hueso)
    <p class="text">
        {{$hueso->texto}}</a>
    </p>
    @endforeach
</div>
@endsection