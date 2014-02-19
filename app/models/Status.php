<?php 

/**
* Status model
*/
class Status extends Eloquent
{
	protected $fillable = array('title', 'description');

	public static $rules = array(
		'title' => 'required|min:3|unique:statuses',
		'description' => 'required|between:10,255'
	);

	public function orders()
	{
		return $this->hasMany('Order');
	}
}