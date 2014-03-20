@extends('layouts.main')

@section('content')
	
  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви можете переглядати, додавати і видаляти характеристики.</p>

    <h2>Характеристики</h2><hr>

    <ul>
      @foreach($specifications as $specification)
        <li>
          {{ $specification->name }} —
          {{ Form::open(array('url' => 'admin/specifications/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $specification->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати характеристику</h2><hr>
    
    @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/specifications/create')) }}
    <p>
      {{ Form::label('name', 'Назва') }}
      {{ Form::text('name') }}
    </p>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->
@stop