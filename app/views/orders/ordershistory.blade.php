@extends('layouts.main')

@section('content')
                <aside id="my-account-menu">
                    <h3>ACCOUNT</h3>
                    <ul>
                        <!-- <li><a href="#">My Account</a></li> -->
                        <li>{{ HTML::link('/orders/ordershistory', 'Orders history') }}</li>
                        <li>{{ HTML::link('/store/wishlist', 'Wishlist') }}</li>
                        <li>{{ HTML::link('/users/signout', 'Sign Out') }}</li>
                    </ul>
                </aside><!-- end my-account-menu -->

                <div id="order-history">
                    <h1>Orders History</h1>
                    
                    <table border="1">
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($orders as $order)
	                        <tr>
	                            <td>{{ HTML::link('/orders/vieworder/'.$order->id, $order->id) }}</td>
	                            <td>{{ $order->created_at }}</td>
	                            <td>${{ $order->total }}</td>
	                            <td>
	                            	<span title="{{ $order->status->description }}">{{ $order->status->title }}</span>
				                    <a href="/orders/cancelorder/{{ $order->id }}">
				                        {{ HTML::image('img/remove.gif', 'Cancel order')}}
				                    </a>
		                    	</td>
	                        </tr>
                        @endforeach
                    </table>
                </div><!-- end order-history -->
@stop