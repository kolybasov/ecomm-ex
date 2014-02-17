@extends('layouts.main')

@section('content')
	
	<div id="new-account">
		<h1>Add New order</h1>
	    @if($errors->has())
	      <div id="form-errors">
	        <p>The following errors have ocurred:</p>
	        <ul>
	          @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	          @endforeach
	        </ul>
	      </div><!-- end form-errors -->
	    @endif

	    {{ Form::open(array('url' => 'orders/addorder')) }}
	    <p>
	    	{{ Form::label('payment') }}
	    	{{ Form::select('payment', array(1 => 'Cash', 2 => 'Cashless'), 1) }}
	    </p>
	    <p>
	    	{{ Form::label('comment') }}
	    	{{ Form::textarea('comment') }}
	    </p>
		{{ Form::submit('ADD NEW ORDER', array('class' => 'secondary-cart-btn')) }}
		{{ Form::close() }}

    </div><!-- end new-account -->
@stop