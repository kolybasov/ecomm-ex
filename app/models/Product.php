<?php

class Product extends Eloquent {

  protected $fillable = array(
    'category_id',
    'title',
    'description',
    'price',
    'availability',
    'image'
  );

  public static $rules = array(
    'category_id'   => 'required|integer|exists:categories,id',
    'title'         => 'required|min:2|unique:products,title',
    'description'   => 'required|min:28',
    'price'         => 'required|numeric',
    'availability'  => 'integer',
    'image'         => 'required|image|mimes:jpeg,jpg,bmp,png,gif'
  );

  public function categories() {
    return $this->belongsTo('Category');
  }

  public function specifications()
  {
    return $this->belongsToMany('Specification')->withPivot('value');
  }

}