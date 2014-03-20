@extends('layouts.main')

@section('content')
	<div id="shopping-cart">
	    <h1>Кошик і оформлення замовлення</h1>
	    	@if (Cart::totalItems() > 0)
	        <table border="1">
	            <tr>
	                <th>#</th>
	                <th>Назва</th>
	                <th>Ціна</th>
	                <th>Кількість</th>
	                <th>Сума</th>
	            </tr>
	            @foreach ($products as $product)
		            <tr>
		                <td>{{ $product->id }}</td>
		                <td>
		                	{{ HTML::image($product->image, $product->name, array('width' => '65', 'height' => '37')) }}
		                    {{ $product->name }}
		                </td>
		                <td>${{ $product->price }}</td>
		                <td>
		                    {{ $product->quantity }}
		                </td>
		                <td>
		                    ${{ $product->price*$product->quantity }}
		                    <a href="/store/removeitem/{{ $product->identifier }}">
		                        {{ HTML::image('img/remove.gif', 'Видалити товар')}}
		                    </a>
		                </td>
		            </tr>
	            @endforeach

	            <tr class="total">
	                <td colspan="5">
	                    <span>ЗАГАЛОМ: ${{ Cart::total() }}</span><br />

                    	{{ HTML::link('orders/order', 'Оформити замовлення', array('class' => 'order-btn')) }}
                    	{{ HTML::link('/', 'Продовжити покупки', array('class' => 'tertiary-btn')) }}

	                </td>
	            </tr>
	        </table>
			@else
				<p>Кошик порожній</p>
	    	@endif
	</div><!-- end shopping-cart -->
@stop