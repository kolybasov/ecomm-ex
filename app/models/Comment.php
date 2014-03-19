<?php

class Comment extends Eloquent {
	protected $fillable = array('user_id','product_id','body');

	public static $rules = array(
		'user_id' => '',
		'product_id' => 'required|exists:products,id',
		'body' => 'required|between:5,255'
	);

	public function user() {
		return $this->belongsTo('User');
	}

	public function product() {
		return $this->belongsTo('Product');
	}
}