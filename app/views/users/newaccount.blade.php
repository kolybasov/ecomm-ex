@extends('layouts.main')

@section('content')

	<div id="new-account">
		<h1>Створити новий акаунт</h1>
		@include('partials.errors', $errors)

	    {{ Form::open(array('url' => 'users/create')) }}
	    <p>
	    	{{ Form::label('firstname', 'Ім\'я') }}
	    	{{ Form::text('firstname') }}
	    </p>
	    <p>
	    	{{ Form::label('lastname', 'Прізвище') }}
	    	{{ Form::text('lastname') }}
	    </p>
	    <p>
	    	{{ Form::label('email') }}
	    	{{ Form::text('email') }}
	    </p>
	    <p>
	    	{{ Form::label('password', 'Пароль') }}
	    	{{ Form::password('password') }}
	    </p>
	    <p>
	    	{{ Form::label('password_confirmation', 'Підтвердіть') }}
	    	{{ Form::password('password_confirmation') }}
	    </p>
	    <p>
	    	{{ Form::label('phone', 'Телефон') }}
	    	{{ Form::text('phone') }}
	    </p>
		{{ Form::submit('Створити', array('class' => 'secondary-cart-btn')) }}
		{{ Form::close() }}

    </div><!-- end new-account -->

@stop