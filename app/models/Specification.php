<?php

/**
* Specification Model
*/
class Specification extends Eloquent
{
	protected $fillable = array('name');

	public static $rules = array(
		'name' => 'required|between:2,255'
	);
}