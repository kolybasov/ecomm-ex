@extends('layouts.main')

@section('content')
  <aside id="categories-menu">
      <h3>COMPANIES</h3>
      <ul>
          @foreach($companies as $company)
              <li>{{ HTML::link('#', $company->name) }}</li>
          @endforeach
      </ul>
  </aside><!-- end categories-menu -->

  <div id="product-image">
      {{ HTML::image($product->image, $product->title) }}
  </div><!-- end product-image -->
  <div id="product-details">
      <h1>{{ $product->title }}</h1>
      <p>{{ $product->description }}</p>

      <hr />

      @foreach ($product->specifications as $specification)
      {{ $specification->name }} : {{ $specification->pivot->value }} <br>
      @endforeach
      
      <br> <hr />

      {{ Form::open(array('url' => 'store/addtocart')) }}
          {{ Form::label('quantity', 'Qty') }}
          {{ Form::text('quantity', 1, array('maxlength' => 2)) }}
          {{ Form::hidden('id', $product->id) }}

          <button type="submit" class="secondary-cart-btn">
              {{ HTML::image('img/white-cart.gif', 'Add to Cart') }}
               ADD TO CART
          </button>
      {{ Form::close() }}

      {{ Form::open(array('url' => 'store/addtowishlist')) }}
          {{ Form::hidden('id', $product->id) }}

          <button type="submit" class="secondary-cart-btn">
              {{ HTML::image('img/white-cart.gif', 'Add to Wishlist') }}
               ADD TO WISHLIST
          </button>
      {{ Form::close() }}
  </div><!-- end product-details -->
  <div id="product-info">
      <p class="price">${{ $product->price }}</p>
      <p>
        Availability:
        <span class="{{ Availability::displayClass($product->availability) }}">
          {{ Availability::display($product->availability) }}
        </span>
      </p>
      <p>Product Code: <span>{{ $product->id }}</span></p>
  </div><!-- end product-info -->
      
  <br> <hr>

 @foreach ($product->comments as $comment)
    <div class="comments">
      <h4>
        {{ $comment->user->firstname.' '.$comment->user->lastname.' | '.$comment->created_at }}
        @if (Auth::user()->admin == 1)
          {{ Form::open(array('url'=>'comments/delete')) }}
          {{ Form::hidden('id', $comment->id) }}
          {{ Form::submit('Delete!') }}
          {{ Form::close() }}
        @endif
      </h4>
      <p class="body">{{ $comment->body }}</p>
    </div>
  @endforeach
  {{ Form::open(array('url'=>'comments/create')) }}
  {{ Form::label('body', 'Leave your comment:') }} <br>
  @if (Auth::guest())
    {{ Form::textarea('body', 'Registration required!') }}
  @else
    {{ Form::textarea('body') }}
  @endif
  {{ Form::hidden('product_id', $product->id) }} <br>
  {{ Form::submit('Send comment!') }}
  {{ Form::close() }}

@stop