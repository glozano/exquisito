@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
{{ csrf_field() }}
    <div class="container">
        <input id="name" type="text" class="form-control" name="name" style="display:none"/>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <div class="col-md-4 col-xs-10">
                <label for="name" class="control-label">tu nombre</label>
                <br/>
                <span class="blink typed-cursor marca">
                    >
                </span>
                <input id="name" type="text" class="discrete" name="name">
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row" >
            <div class="col-md-4 col-xs-10">
                <label for="password-" class="control-label">tu clave</label>
                <br/>
                <span class="blink typed-cursor marca">
                    >
                </span>
                <input id="password" type="password" class="discrete" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="flechiboton">
            >
        </button>
    </div>
</form>
@endsection
