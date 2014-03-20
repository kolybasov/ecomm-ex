@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви можете створювати, переглядати і видаляти компанії виробники.</p>

    <h2>Компанії</h2><hr>

    <ul>
      @foreach($companies as $company)
        <li>
          {{ $company->name }} —
          {{ Form::open(array('url' => 'admin/companies/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $company->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати нову компанію</h2><hr>

   @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/companies/create')) }}
    <p>
      {{ Form::label('name') }}
      {{ Form::text('name') }}
    </p>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop