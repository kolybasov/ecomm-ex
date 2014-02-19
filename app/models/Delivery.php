<?php

/**
* Deliveries model 
*/
class Delivery extends Eloquent
{
	protected $fillable = array('title', 'description');
	
	public static $rules = array(
		'title' => 'required|min:3|unique:deliveries',
		'description' => 'required|min:10'
	);

	public function products()
	{
		return $this->hasMany('Product');
	}
}