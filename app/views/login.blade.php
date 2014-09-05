@extends('main')

@section('content')

<div id="banner">
    <h3>Namn och legitimation, tack.</h3>

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array(
    	'action' => 'login',
    	'method' => 'POST'
    	)
    )
    }}

    <!-- username field -->
    <p>
        {{ Form::label('username', 'Användarnamn:') }}<br/>
        {{ Form::text('username', Input::old('username')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', 'Lösenord:') }}<br/>
        {{ Form::password('password') }}
    </p>

    <!-- submit button -->
    <p>{{ Form::submit('Logga in') }}</p>

    {{ Form::close() }}
</div>
@stop

@section('scripts')
@stop