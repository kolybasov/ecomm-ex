@extends('layouts.main')

@section('promo')

  <section id="promo">
      <div id="promo-details">
          <h1>Сьогоднішні пропозиції</h1>
          <p>Придбайте товари з цього розділу<br />
           за зниженою ціною.</p>
          <a href="#" class="default-btn">Придбати</a>
      </div><!-- end promo-details -->
      {{ HTML::image('img/promo.png', 'Реклама') }}
  </section><!-- promo -->

@stop

@section('content')

  <h2>Нові товари</h2>
  <hr>
  <div id="products">
    @foreach($products as $product)
      <div class="product">
          <a href="/store/view/{{ $product->id }}">
            {{ HTML::image($product->image, $product->title, array('class' => 'feature', 'width' => '240', 'height' => '127')) }}
          </a>

          <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

          <p>{{ Textshorter::short(array('shorten'=>'true','str'=>$product->description, 'length'=>100)) }}</p>

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
                <span class="price">${{ $product->price }}</span>
                {{ HTML::image('img/white-cart.gif', 'Додати до кошика') }}
                Придбати
              </button>
              {{ Form::close() }}

          </p>
      </div><!-- end product -->
    @endforeach
  </div><!-- end products -->

@stop