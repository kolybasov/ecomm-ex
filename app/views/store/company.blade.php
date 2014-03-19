@extends('layouts.main')

@section('content')

  <h2>{{ $company->name }}</h2>
    <hr>

    <aside id="categories-menu">
        <h3>COMPANIES</h3>
        <ul>
            @foreach($companies as $company)
                <li>
                    {{ HTML::link('/store/company/'.$company->id, $company->name) }}
                </li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->

    <div id="listings">

      @foreach($products as $product)
        <div class="product">
            <a href="/store/view/{{ $product->id }}">
              {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
            </a>

            <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>

            <h5>
              Availability:
              <span class="{{ Availability::displayClass($product->availability) }}">
                {{ Availability::display($product->availability) }}
              </span>
            </h5>

            <p>
                {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">${{ $product->price }}</span>
                    {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
                    ADD TO CART
                </button>
                {{ Form::close() }}
            </p>
        </div>
        @endforeach

  </div><!-- end listings -->

@stop

@section('pagination')

  <section id="pagination">
    {{ $products->links() }}
  </section><!-- end pagination -->

@stop