@extends('layouts.main')

@section('content')

  <div id="admin">
    <h1>Панель адміністратора</h1><hr>

    <p>Тут ви можете переглядати, додавати і видаляти товари.</p>

    <h2>Товари</h2><hr>

    <ul>
      @foreach($products as $product)
        <li>
          {{ HTML::image($product->image, $product->title, array('width' => '50')) }}
          {{ $product->title }} -
          {{ Form::open(array('url' => 'admin/products/destroy', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $product->id) }}
          {{ Form::submit('видалити') }}
          {{ Form::close() }} -

          {{ Form::open(array('url' => 'admin/products/toggle-availability', 'class' => 'form-inline')) }}
          {{ Form::hidden('id', $product->id) }}
          {{ Form::select('availability', array('1' => 'Є в наявності', '0' => 'Відсутній'), $product->availability) }}
          {{ Form::submit('Оновити') }}
          {{ Form::close() }}
        </li>
      @endforeach
    </ul>


    <h2>Додати новий товар</h2><hr>
    
    @include('partials.errors', $errors)

    {{ Form::open(array('url' => 'admin/products/create', 'files' => true)) }}
    <p>
      {{ Form::label('category_id', 'Категорія') }}
      {{ Form::select('category_id', $categories) }}
    </p>
    <p>
      {{ Form::label('company_id', 'Компанія') }}
      {{ Form::select('company_id', $companies) }}
    </p>
    <p>
      {{ Form::label('title', 'Назва') }}
      {{ Form::text('title') }}
    </p>
    <p>
      {{ Form::label('description', 'Опис') }}
      {{ Form::textarea('description') }}
    </p>
    <p>
      {{ Form::label('price', 'Ціна') }}
      {{ Form::text('price', null, array('class' => 'form-price')) }}
    </p>
    <p>
      {{ Form::label('image', 'Виберіть зображення') }}
      {{ Form::file('image') }}
    </p>
    <p class="specs-field">
      {{ Form::select('specification_id[]', $specs, 0, array('class'=>'specs-list')) }}
      {{ Form::text('value[]','') }}
      <button class="del_spec">видалити</button>
    </p>
    <button class="add_spec">Додати характеристику</button> <br> <br>
    {{ Form::submit('Додати', array('class' => 'secondary-cart-btn')) }}
    {{ Form::close() }}

  </div><!-- end admin -->

@stop