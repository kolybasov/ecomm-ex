@extends('layouts.main')

@section('content')
	
	<div id="shopping-cart">
	    <h1>Список бажаного</h1>
	    @if ($products->count() == 0)
	    	Список бажаного порожній
	    @else
	        <table border="1">
	            <tr>
	                <th>#</th>
	                <th>Назва</th>
	                <th>Ціна</th>
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
		                        {{ HTML::image('img/remove.gif', 'Видалити товар')}}
		                    </a>
		                </td>
		            </tr>
	            @endforeach
	        </table>
            {{ HTML::link('/', 'Продовжити покупки', array('class' => 'tertiary-btn')) }}	
	</div><!-- end shopping-cart -->

	@endif

@stop