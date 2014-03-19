<?php

class ProductsController extends BaseController {

  public function __construct() {
    parent::__construct();
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('admin');
  }

  public function getIndex() {
    $categories = array();
    $specs = array();
    $companies = array();

    foreach (Category::all() as $category) {
      $categories[$category->id] = $category->name;
    }    
    foreach (Specification::all() as $specification) {
      $specs[$specification->id] = $specification->name;
    }
    foreach (Company::all() as $company) {
      $companies[$company->id] = $company->name;
    }

    return View::make('products.index')
      ->with('products', Product::all())
      ->with('specs', $specs)
      ->with('categories', $categories)
      ->with('companies', $companies);
  }

  public function postCreate() {
    $validator = Validator::make(Input::except('specification_id','value'), Product::$rules);
    if (!Input::has('specification_id') or !Input::has('value')) {
      return Redirect::to('admin/products/index')
        ->with('message', 'Something went wrong!')
        ->withErrors($validator)
        ->withInput(Input::except('specification_id', 'value'));
    }

    if($validator->passes()) {
      $product = new Product;
      $product->category_id = Input::get('category_id');
      $product->company_id = Input::get('company_id');
      $product->title = Input::get('title');
      $product->description = Input::get('description');
      $product->price = Input::get('price');
      $image = Input::file('image');
      $filename = date('Y-m-d-H:i:s').'-'.$image->getClientOriginalName();
      Image::make($image->getRealPath())->resize(468, 249)->save(public_path().'/img/products/'.$filename);
      $product->image = 'img/products/'.$filename;
      $product->save();

      
      foreach (Input::get('specification_id') as $key => $specification)
      {
        $specifications[$specification] = array('value'=>Input::get('value')[$key]);
      }
      $product->specifications()->sync($specifications);


      return Redirect::to('admin/products/index')
        ->with('message', 'Product created!');
    }

    return Redirect::to('admin/products/index')
      ->with('message', 'Something went wrong!')
      ->withErrors($validator)
      ->withInput(Input::except('specification_id', 'value'));
  }

  public function postToggleAvailability() {
    $product = Product::find(Input::get('id'));

    if($product) {
      $product->availability = Input::get('availability');
      $product->save();
      return Redirect::to('admin/products/index')
        ->with('message', 'Product updated');
    }

    return Redirect::to('admin/products/index')
      ->with('message', 'Invalid product!');
  }

  public function postDestroy() {
    $product = Product::find(Input::get('id'));

    if($product) {
      File::delete('public/'.$product->image);
      $product->delete();
      return Redirect::to('admin/products/index')
        ->with('message', 'Product deleted!');
    }

    return Redirect::to('admin/products/index')
      ->with('message', 'Something went wrong. Try again!');
  }
}