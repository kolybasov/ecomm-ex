@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Admin panel</h1><hr>

    <p>Here you can view, delete, and create new companies.</p>

    <h2>Companies</h2><hr>

    <ul>
      @foreach($companies as $company)
        <li>
          {{ $company->name }} —
          {{ Form::open(array('url' => 'admin/companies/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $company->id) }}
          {{ Form::submit('delete') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Create New Company</h2><hr>

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

    {{ Form::open(array('url' => 'admin/companies/create')) }}
    <p>
      {{ Form::label('name') }}
      {{ Form::text('name') }}
    </p>
    {{ Form::submit('Create Company', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop