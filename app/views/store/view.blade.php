@extends('layouts.main')

@section('content')
    <aside id="categories-menu">
        <h3>КОМПАНІЇ</h3>
        <ul>
            @foreach($companies as $company)
                <li>
                  {{ HTML::link('/store/company/'.$company->id, $company->name) }}
                  @if ($company->name == $product->company->name)
                    <ul>
                        @foreach ($company->products as $prod)
                          <li>{{ HTML::link('/store/view/'.$prod->id, $prod->title) }}</li>
                        @endforeach
                    </ul>
                  @endif
                </li>
            @endforeach
        </ul>
    </aside><!-- end categories-menu -->
  <div id="product">
  <div id="product-image">
      {{ HTML::image($product->image, $product->title) }}
  </div><!-- end product-image -->
  <div id="product-details">
      <h1>{{ $product->title }}</h1>
      <p>{{ $product->description }}</p>

      <hr />

      {{ Form::open(array('url' => 'store/addtocart')) }}
          {{ Form::label('quantity', 'Кількість') }}
          {{ Form::text('quantity', 1, array('maxlength' => 2)) }}
          {{ Form::hidden('id', $product->id) }}

          <button type="submit" class="secondary-cart-btn">
              {{ HTML::image('img/white-cart.gif', 'Додати до кошика') }}
              Придбати
          </button>
      {{ Form::close() }}

      {{ Form::open(array('url' => 'store/addtowishlist', 'class' => 'wish-btn')) }}
          {{ Form::hidden('id', $product->id) }}

          <button type="submit" class="tertiary-btn">
              {{ HTML::image('img/wish.gif', 'Add to Wishlist') }}
               Додати до списку бажаного
          </button>
      {{ Form::close() }}
  </div><!-- end product-details -->
  <div id="product-info">
      <p class="price">${{ $product->price }}</p>
      <p>
        Наявність:
        <span class="{{ Availability::displayClass($product->availability) }}">
          {{ Availability::display($product->availability) }}
        </span>
      </p>
      <p>Код товару: <span>{{ $product->id }}</span></p>
  </div><!-- end product-info -->
  <div class="product-etc">
  <div class="comments">
  <h2>Коментарі</h2>
  <hr>
 @foreach ($product->comments as $comment)
    <h4>
      {{ $comment->user->firstname.' '.$comment->user->lastname.' <span class="comment-date">'.$comment->created_at }}</span>
      @if (Auth::user()->admin == 1)
        {{ Form::open(array('url'=>'comments/delete')) }}
        {{ Form::hidden('id', $comment->id) }}
        {{ Form::submit('Видалити', array('class' => 'comment-del')) }}
        {{ Form::close() }}
      @endif
    </h4>
    <p class="body">{{ $comment->body }}</p>
  @endforeach
  {{ Form::open(array('url'=>'comments/create')) }}
  {{ Form::label('body', 'Залиште коментар:') }} <br>
  @if (Auth::guest())
    {{ Form::textarea('body', 'Необхідна реєстрація!', array('class' => 'comment-form')) }}
  @else
    {{ Form::textarea('body', null, array('class' => 'comment-form')) }}
  @endif
  {{ Form::hidden('product_id', $product->id) }} <br>
  {{ Form::submit('Надіслати!', array('class' => 'comment-btn')) }}
  {{ Form::close() }}
    
  </div>
  <div class="specs">
      <h2>Характеристики</h2>
      <hr>
      @foreach ($product->specifications as $specification)
        <div class="specs-title">{{ $specification->name }}</div>
        <div class="specs-value">{{ $specification->pivot->value }}</div>
      @endforeach
  </div>
    
  </div>

  </div>    

@stop