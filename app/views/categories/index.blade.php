@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви зможете переглядати, створювати і видаляти категорії.</p>

    <h2>Категорії</h2><hr>

    <ul>
      @foreach($categories as $category)
        <li>
          {{ $category->name }} —
          {{ Form::open(array('url' => 'admin/categories/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $category->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати нову категорія</h2><hr>

    @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/categories/create')) }}
    <p>
      {{ Form::label('name') }}
      {{ Form::text('name') }}
    </p>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop