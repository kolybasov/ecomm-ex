@extends('layouts.main')

@section('search-keyword')
  <hr>
  <section id="search-keyword">
      <h1>Результати пошуку для <span>{{ $keyword }}</span></h1>
  </section><!-- end search-keyword -->
@stop

@section('content')

  <div id="search-results">
    @foreach($products as $product)
      <div class="product">
          <a href="/store/view/{{ $product->id }}">
            {{ HTML::image($product->image, $product->title, array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
          </a>

          <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

          <p>{{ $product->description }}</p>

          <h5>
            Наявність:
            <span class="{{ Availability::displayClass($product->availability) }}">
              {{ Availability::display($product->availability) }}
            </span>
          </h5>

          <p>
              {{ Form::open(array('url' => 'store/addtocart')) }}
              {{ Form::hidden('quantity', 1) }}
              {{ Form::hidden('id', $product->id) }}
              <button type="submit" class="cart-btn">
                <span class="price">{{ $product->price }}</span>
                {{ HTML::image('img/white-cart.gif', 'Додати до кошика') }}
                Додати до кошика
              </button>
              {{ Form::close() }}

          </p>
      </div><!-- end product -->
    @endforeach
  </div><!-- end search-results -->

@stop