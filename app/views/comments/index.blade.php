@extends('store.view')

@section('comments')
	@foreach ($product->comments as $comment)
		<div class="comments">
			<h3>{{ $comment->user->id }} | {{ $comment->created_at }}</h3>
			<p class="body">{{ $comment->body }}</p>
		</div>
	@endforeach
@stop

@section('add')
	{{ Form::open(array('url'=>'comments/create')) }}
	{{ Form::input('textarea', 'body') }}
	{{ Form::hidden('product_id', $product->id, options) }}
	{{ Form::submit('Send comment!') }}
	{{ Form::close() }}
@stop