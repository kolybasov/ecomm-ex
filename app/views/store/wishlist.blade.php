@extends('layouts.main')

@section('content')
	
	<div id="shopping-cart">
	    <h1>Wishlist</h1>
	        <table border="1">
	            <tr>
	                <th>#</th>
	                <th>Product Name</th>
	                <th>Unit Price</th>
	            </tr>
	            @foreach ($products as $product)
		            <tr>
		                <td>{{ $product->id }}</td>
		                <td>
		                	{{ HTML::image($product->image, $product->name, array('width' => '65', 'height' => '37')) }}
		                    {{ $product->title }}
		                </td>
		                <td>
		                    ${{ $product->price }}
		                    <a href="/store/removefromwishlist/{{ $product->id }}">
		                        {{ HTML::image('img/remove.gif', 'Remove product')}}
		                    </a>
		                </td>
		            </tr>
	            @endforeach
	        </table>
            {{ HTML::link('/', 'Continue Shopping', array('class' => 'tertiary-btn')) }}	
	</div><!-- end shopping-cart -->

@stop