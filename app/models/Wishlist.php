<?php

class Wishlist extends Eloquent
{
	/**
	 * Select wishlist table
	 * @var string
	 */
	protected $table = 'wishlist';

	protected $fillable = array('user_id', 'product_id');

	public static $rules = array(
		'user_id' => 'required|exists:users,id',
		'product_id' => 'required|exists:products,id'
	);
}