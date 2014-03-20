@extends('layouts.main')

@section('content')
	    
    @include('partials.account') 

                <div id="order-details">
                    <h1>Деталі замовлення</h1>
                    <h2>Замовлення #{{ $order->id }}</h2>
                    <p>
                        Дата: {{ $order->created_at }} <br>
                        <span title="{{ $order->status->description }}">Статус: {{ $order->status->title }}</span> <br>
                        Адреса: {{ $order->address }} <br>
                        Коментар: {{ $order->comment }}
                    </p>
                    <h2>Інформація про покупця</h2>
                    <p>
                        Ім'я: {{ $order->user->firstname.' '.$order->user->lastname }}<br />
                        Телефон: {{ $order->user->phone }}<br />
                        Email: {{ $order->user->email }}
                    </p>
                    <h2>Товари</h2>
                    <table border="1">
                        <tr>
                            <th>#</th>
                            <th>Назва</th>
                            <th>Ціна</th>
                            <th>Кількість</th>
                            <th>Сума</th>
                        </tr>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->pivot->price }}</td>
                                <td>{{ $product->pivot->count }}</td>
                                <td>{{ $product->pivot->count*$product->pivot->price }}</td>
                            </tr>
                        @endforeach

                        <tr class="total">
                            <td colspan="5">
                                <span>ЗАГАЛОМ: ${{ $order->total }}</span>
                            </td>
                        </tr>
                    </table>

                    {{ HTML::link('/orders/ordershistory', 'Повернутися до історії замовлень', array('class' => 'tertiary-btn')) }}
                </div><!-- end order-details -->
@stop