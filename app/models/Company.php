<?php

class Company extends Eloquent {
	protected $fillable = array('name');

	public static $rules = array(
		'name' => 'required|unique:companies'
	);

	public function products()
	{
		return $this->hasMany('Product');
	}
}