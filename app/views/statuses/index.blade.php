@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви можете переглядати, видаляти і додавати статуси замовлення.</p>

    <h2>Статуси</h2><hr>

    <ul>
      @foreach($statuses as $status)
        <li>
          {{ $status->title }} —
          {{ Form::open(array('url' => 'admin/statuses/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $status->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати статус</h2><hr>

    @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/statuses/create')) }}
    <p>
      {{ Form::label('title', 'Ім\'я') }}
      {{ Form::text('title') }}
    </p>
    <p>
      {{ Form::label('description', 'Опис') }}
      {{ Form::textarea('description') }}
    </p>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop