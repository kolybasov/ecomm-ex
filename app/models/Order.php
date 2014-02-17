<?php

/**
* Order model
*/
class Order extends Eloquent
{
	protected $fillable = array(
		'user_id',
		'payment',
		'status',
		'comment',
		'total'
	);

	public static $rules = array(
		'user_id' => 'required|exists:users,id',
		'payment' => 'required|integer',
		'status' => 'required|integer',
		'comment' => 'between:5, 255',
		'total' => 'required|numeric'
	);

	public function user()
	{
		return $this->belongsTo('User');
	}
}