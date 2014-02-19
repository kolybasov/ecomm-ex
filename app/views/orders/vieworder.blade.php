@extends('layouts.main')

@section('content')
	
                <aside id="my-account-menu">
                    <h3>ACCOUNT</h3>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li>{{ HTML::link('/orders/ordershistory', 'Orders history') }}</li>
                        <li>{{ HTML::link('/store/wishlist', 'Wishlist') }}</li>
                        <li>{{ HTML::link('/users/signout', 'Sign Out') }}</li>
                    </ul>
                </aside><!-- end my-account-menu -->

                <div id="order-details">
                    <h1>Order Details</h1>
                    <h2>Order #{{ $order->id }}</h2>
                    <p>
                        Date: {{ $order->created_at }} <br>
                        <span title="{{ $order->status->description }}">Status: {{ $order->status->title }}</span> <br>
                        Address: {{ $order->address }} <br>
                        Comment: {{ $order->comment }}
                    </p>
                    <h2>Buyer Information</h2>
                    <p>
                        Name: {{ $order->user->firstname.' '.$order->user->lastname }}<br />
                        Phone: {{ $order->user->phone }}<br />
                        Email: {{ $order->user->email }}
                    </p>
                    <h2>Products</h2>
                    <table border="1">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
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
                                Subtotal: ${{ $order->total }}<br />
                                <span>TOTAL: ${{ $order->total }}</span>
                            </td>
                        </tr>
                    </table>

                    {{ HTML::link('/orders/ordershistory', 'BACK TO ORDER HISTORY', array('class' => 'tertiary-btn')) }}
                </div><!-- end order-details -->
@stop