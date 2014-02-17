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
                    <p>Date: {{ $order->created_at }}</p>
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
                        <tr>
                            <td>1</td>
                            <td>Product Name</td>
                            <td>$400</td>
                            <td>1</td>
                            <td>$400</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Product Name</td>
                            <td>$400</td>
                            <td>2</td>
                            <td>$800</td>
                        </tr>
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