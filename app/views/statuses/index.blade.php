@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Admin panel</h1><hr>

    <p>Here you can view, delete, and create new statuses.</p>

    <h2>Statuses</h2><hr>

    <ul>
      @foreach($statuses as $delivery)
        <li>
          {{ $delivery->title }} —
          {{ Form::open(array('url' => 'admin/statuses/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $delivery->id) }}
          {{ Form::submit('delete') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Create New Status</h2><hr>

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

    {{ Form::open(array('url' => 'admin/statuses/create')) }}
    <p>
      {{ Form::label('title') }}
      {{ Form::text('title') }}
    </p>
    <p>
      {{ Form::label('description') }}
      {{ Form::textarea('description') }}
    </p>
    {{ Form::submit('Create Status', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop