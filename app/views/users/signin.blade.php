@extends('layouts.main')

@section('content')
	<section id="signin-form">
        <h1>Я маю акаунт</h1>
        {{ Form::open(array('url' => 'users/signin')) }}
            <p>
            	{{ HTML::image('img/email.gif', 'Email адреса') }}
                {{ Form::text('email') }}
            </p>
            <p>
            	{{ HTML::image('img/password.gif', 'Пароль') }}
                {{ Form::password('password') }}
            </p>
            {{ Form::button('Увійти', array('type' => 'submit', 'class' => 'secondary-cart-btn')) }}
        {{ Form::close() }}
    </section><!-- end signin-form -->

    <section id="signup">
	    <h2>Я новий покупець</h2>
	    <h3>
	    	Ви можете створити акаунт за декілька простих кроків.<br>
	    	Перейдіть за посиланням нижче.
	    </h3>
	    {{ HTML::link('users/newaccount', 'Створити новий акаунт', array('class' => 'default-btn')) }}
    </section><!--- end signup -->
@stop