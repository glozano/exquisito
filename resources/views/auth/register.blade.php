@extends('layouts.app')

@section('header')
@endsection

@section('content')
<form role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <h1 id="auto-name"></h1>
    <div class="reg-form container">
        <input id="name" type="text" class="form-control" name="name" style="display:none"/>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
            <div class="col-md-4 col-xs-10">
                <label for="password" class="control-label">clave</label>
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
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row" >
            <div class="col-md-4 col-xs-10">
                <label for="password-confirm" class="control-label">de nuevo</label>
                <br/>
                <span class="blink typed-cursor marca">
                    >
                </span>
                <input id="password-confirm" type="password" class="discrete" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <a id="regenerate">
        <span class="glyphicon glyphicon-repeat"></span>
    </a>
    <div class="form-group">
        <button type="submit" class="flechiboton">
             +
        </button>
    </div>
</form>



<script type="text/javascript">
    generateName();
    $('#regenerate').click(function(){
        generateName();
    });
    function generateName(){
        var nameList = ['Isaura',
            'Mabel',
            'Pablito',
            'Virginia',
            'Gonzalo',
            'Guido',
            'Ricardo',
            'Alberto',
            'Laura',
            'Virginia',
            'Silvia',
            'Nelson',
            'Washington',
            'Ines',
            'Nelly',
            'Irma',
            'Gladys',
            'Flavita',
            'Susy',
            'Horacio',
            'Tito',
            'Ambrosio',
            'JuanCarlos',
            'Pancho',
            'Pocho',
            'Wilson',
            'Roberto',
            'Alfredo',
            'Marcelo',
            'ElRuben',
            'Oscar'];
        var name = nameList[Math.floor(Math.random()*nameList.length)];
        name += Math.floor(Math.random()*40+20);
        $("#auto-name").typed({
            strings: ['Hola '+name],
            typeSpeed: 50,
            showCursor: false
        });
        $('#name').val(name);
    }

</script>
@endsection

