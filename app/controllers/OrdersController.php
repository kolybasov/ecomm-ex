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
    	$this->beforeFilter('admin',array('only'=>'getIndex'));
	}

	public function getIndex()
	{
		return View::make('orders.all')
			->with('orders', Order::paginate(10));
	}

	public function getOrdershistory()
	{
		return View::make('orders.ordershistory')
		  ->with('orders', Auth::user()->orders);
	}

	public function postAddorder()
	{
		$data = Input::all();
		$data['user_id'] = Auth::user()->id;
		$data['status_id'] = 1;
		$data['total'] = Cart::total();
		$validator = Validator::make($data, Order::$rules);

		if ($validator->fails()) {
			return Redirect::to('orders/order')
				->with('message', 'Поля заповнені неправильно!')
				->withErrors($validator->errors())
				->withInput();
		}

		$order = new Order;
		$order->user_id = $data['user_id'];
		$order->payment = $data['payment'];
		$order->status_id = $data['status_id'];
		$order->delivery_id = $data['delivery_id'];
		$order->address = $data['address'];
		$order->comment = $data['comment'];
		$order->total = $data['total'];
		$order->save();		

		foreach (Cart::contents() as $item) {
	        $products[$item->id] = array('count' => $item->quantity, 'price' => $item->price);
		}
		$order->products()->sync($products);

		Cart::destroy();

		return Redirect::to('orders/ordershistory')
		  ->with('message', 'Замовлення надіслане!');
	}

	public function getCancelorder($id)
	{
		$order = Order::find($id);
		if($order) {
			$order->status_id = 2;
			$order->save();

		return Redirect::to('orders/ordershistory')
		  ->with('message', 'Замовлення відхилене!');
		}

		return Redirect::back()
		  ->with('message', 'Щось пішло не так!');
	}

	public function getVieworder($id)
	{
		$order = Order::find($id);
		if ((Auth::user()->id == $order->user_id or Auth::user()->admin == 1) and $order) {
			return View::make('orders.vieworder', compact('order'));
		}
		return Redirect::to('orders/ordershistory')
		  ->with('message', 'Щось пішло не так!');
	}

	public function getOrder()
	{
		$deliveries = array();
		foreach (Delivery::all() as $delivery) {
			$deliveries[$delivery->id] = $delivery->title;
		}
		return View::make('orders.index')
			->with('deliveries', $deliveries);
	}
}