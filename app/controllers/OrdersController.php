<?php

/**
* Orders Controller
*/
class OrdersController extends BaseController
{
	function __construct()
	{
		parent::__construct();
    	$this->beforeFilter('csrf', array('on' => 'post'));
    	$this->beforeFilter('auth', array('only' => array(
	      'getOrdershistory',
	      'postAddorder',
	      'getCancelorder',
	      'getVieworder',
	      'getOrder'
    	)));
	}

	public function getOrdershistory()
	{
		return View::make('orders.ordershistory')
		  ->with('orders', Auth::user()->orders);
	}

	public function postAddorder()
	{
		$order = new Order;
		$order->user_id = Auth::user()->id;
		$order->payment = Input::get('payment');
		$order->status = 1;
		$order->comment = Input::get('comment');
		$order->total = Cart::total();
		$order->save();

		Cart::destroy();

		return Redirect::to('orders/ordershistory')
		  ->with('message', 'Order has been sent');
	}

	public function getCancelorder($id)
	{
		$order = Order::find($id);
		$order->status = 2;
		$order->save();

		return Redirect::to('orders/ordershistory')
		  ->with('message', 'Order has been canceled');
	}

	public function getVieworder($id)
	{
		$order = Order::find($id);
		return View::make('orders.vieworder', compact('order'));
		  //->with('order', Order::find($id));
	}

	public function getOrder()
	{
		return View::make('orders.index');
	}
}