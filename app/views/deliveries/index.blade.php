@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Admin panel</h1><hr>

    <p>Here you can view, delete, and create new deliveries.</p>

    <h2>Deliveries</h2><hr>

    <ul>
      @foreach($deliveries as $delivery)
        <li>
          {{ $delivery->title }} —
          {{ Form::open(array('url' => 'admin/deliveries/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $delivery->id) }}
          {{ Form::submit('delete') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Create New Delivery</h2><hr>

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

    {{ Form::open(array('url' => 'admin/deliveries/create')) }}
    <p>
      {{ Form::label('title') }}
      {{ Form::text('title') }}
    </p>
    <p>
      {{ Form::label('description') }}
      {{ Form::textarea('description') }}
    </p>
    {{ Form::submit('Create Delivery', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop