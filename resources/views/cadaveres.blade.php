@extends('layouts.app')

@section('header')

@endsection

@section('content')
    <h1>cadáveres</h1>
    <div class="container cadaveres">
        @foreach ($cadaveres as $cadaver)
        <p class="text">
            <a href="{{ route('cadaver', $cadaver->id ) }}">{{$cadaver->titulo}}</a>
        </p>
        @endforeach
    </div>
    <div class="form-group">
        <a href="{{ url('titulo') }}" class="flechiboton">
            +
        </a>
    </div>

@endsection