@extends('layouts.main')

@section('content')
	
  <div id="admin">
    <h1>Admin panel</h1><hr>

    <p>Here you can view, delete, and create new specifications.</p>

    <h2>Specifications</h2><hr>

    <ul>
      @foreach($specifications as $specification)
        <li>
          {{ $specification->name }} —
          {{ Form::open(array('url' => 'admin/specifications/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $specification->id) }}
          {{ Form::submit('delete') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Create New Specification</h2><hr>

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

    {{ Form::open(array('url' => 'admin/specifications/create')) }}
    <p>
      {{ Form::label('name') }}
      {{ Form::text('name') }}
    </p>
    {{ Form::submit('Create Specification', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->
@stop