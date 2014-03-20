@extends('layouts.main')

@section('content')
    @include('partials.account')    
    <div id="order-history">
        <h1>Історія замовлень</h1>

        <table border="1">
            <tr>
                <th>№ замовлення</th>
                <th>Замовник</th>
                <th>Дата</th>
                <th>Сума</th>
                <th>Статус</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ HTML::link('/orders/vieworder/'.$order->id, $order->id) }}</td>
                    <td>{{ $order->user->firstname.' '.$order->user->lastname }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>${{ $order->total }}</td>
                    <td>
                    	<span title="{{ $order->status->description }}">{{ $order->status->title }}</span>
                        <a href="/orders/cancelorder/{{ $order->id }}">
                            {{ HTML::image('img/remove.gif', 'Відмінити замовлення')}}
                        </a>
                	</td>
                </tr>
            @endforeach
        </table>
    </div><!-- end order-history -->
@stop

@section('pagination')

  <section id="pagination">
    {{ $orders->links() }}
  </section><!-- end pagination -->

@stop