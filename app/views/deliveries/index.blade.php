@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви можете переглядати, додавати і видаляти служби доставки.</p>

    <h2>Служби доставки</h2><hr>

    <ul>
      @foreach($deliveries as $delivery)
        <li>
          {{ $delivery->title }} —
          {{ Form::open(array('url' => 'admin/deliveries/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $delivery->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати службу доставки</h2><hr>

    @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/deliveries/create')) }}
    <p>
      {{ Form::label('title') }}
      {{ Form::text('title') }}
    </p>
    <p>
      {{ Form::label('description') }}
      {{ Form::textarea('description') }}
    </p>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop