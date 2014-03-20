@extends('layouts.main')

@section('content')
	
	<div id="new-account">
		<h1>Оформлення замовлення</h1>
		@include('partials.errors', $errors)

	    {{ Form::open(array('url' => 'orders/addorder')) }}
	    <p>
	    	{{ Form::label('payment', 'Тип платежу') }}
	    	{{ Form::select('payment', array(1 => 'Готівковий', 2 => 'Безготівковий'), 1) }}
	    </p>
	    <p>
	    	{{ Form::label('delivery_id', 'Служба доставки') }}
	    	{{ Form::select('delivery_id', $deliveries) }}
	    </p>
	    <p>
	    	{{ Form::label('address', 'Адреса') }}
	    	{{ Form::textarea('address') }}
	    </p>
	    <p>
	    	{{ Form::label('comment','Коментар') }}
	    	{{ Form::textarea('comment') }}
	    </p>
		{{ Form::submit('Оформити', array('class' => 'secondary-cart-btn')) }}
		{{ Form::close() }}

    </div><!-- end new-account -->
@stop