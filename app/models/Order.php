<?php

/**
* Order model
*/
class Order extends Eloquent
{
	protected $fillable = array(
		'user_id',
		'payment',
		'status_id',
		'delivery_id',
		'address',
		'comment',
		'total'
	);

	public static $rules = array(
		'user_id' => 'required|exists:users,id',
		'payment' => 'required|integer',
		'status_id' => 'required|exists:statuses,id',
		'delivery_id' => 'required|exists:deliveries,id',
		'address' => 'between:5,255',
		'comment' => 'between:5, 255',
		'total' => 'required|numeric'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function products()
	{
		return $this->belongsToMany('Product')->withPivot('count','price');
	}

	public function status()
	{
		return $this->belongsTo('Status');
	}

	public function delivery()
	{
		return $this->belongsTo('Delivery');
	}
}