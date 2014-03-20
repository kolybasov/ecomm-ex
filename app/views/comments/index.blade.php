@extends('store.view')

@section('comments')
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
@stop

@section('add')

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

