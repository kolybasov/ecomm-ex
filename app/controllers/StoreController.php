<?php

class StoreController extends BaseController {

  public function __construct() {
    parent::__construct();
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('auth', array('only' => array(
      'postAddtocart', 
      'getCart', 
      'getRemoveitem', 
      'getWishlist', 
      'postAddtowishlist', 
      'getRemovefromwishlist',
    )));
  }
  
  /**
   * Show main store page
   * @return Response
   */
  public function getIndex() {
    return View::make('store.index')
      ->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
  }

  /**
   * Show selected product
   * @param  integer $id
   * @return Response 
   */
  public function getView($id) {
    return View::make('store.view')
      ->with('product', Product::find($id))
      ->with('companies', Company::all());
  }

  /**
   * Show all products from selected category
   * @param  integer $cat_id
   * @return Response
   */
  public function getCategory($cat_id) {
    return View::make('store.category')
      ->with('products', Product::where('category_id', '=', $cat_id)->paginate(6))
      ->with('category', Category::find($cat_id));
  }

  /**
   * Searching products by keyword
   * @return Response
   */
  public function getSearch() {
    $keyword = Input::get('keyword');

    return View::make('store.search')
      ->with('products', Product::where('title', 'LIKE', '%'.$keyword.'%')->get())
      ->with('keyword', $keyword);
  }

  /**
   * Adding product to shopping cart
   * @return Response
   */
  public function postAddtocart()
  {
    $product = Product::find(Input::get('id'));
    $quantity = Input::get('quantity');

    Cart::insert(array(
      'id' => $product->id,
      'name' => $product->title,
      'price' => $product->price,
      'quantity' => $quantity,
      'image' => $product->image
    ));

    return Redirect::to('store/cart');
  }

  /**
   * Show all products from shopping cart
   * @return Response
   */
  public function getCart()
  {
    return View::make('store.cart')
      ->with('products', Cart::contents());
  }

  /**
   * Remove selected item from shopping cart
   * @param  String $identifier
   * @return Response
   */
  public function getRemoveitem($identifier)
  {
    $item = Cart::item($identifier);
    $item->remove();
    return Redirect::to('store/cart');
  }

  /**
   * Show contacts page
   * @return [type] [description]
   */
  public function getContact()
  {
    return View::make('store.contact');
  }

  /**
   * Show all products from wishlist
   * @return Response
   */
  public function getWishlist()
  {
    return View::make('store.wishlist')
      ->with('products', Auth::user()->wishlist);
  }

  /**
   * Add selected product to wishlist
   * @return Response
   */
  public function postAddtowishlist()
  {
    $product = Product::find(Input::get('id'));

    if ($product) {
      Auth::user()->wishlist()->attach($product->id);
    }

    return Redirect::back()
      ->with('message', 'Added to wishlist');
  }

  /**
   * Remove selected product from wishlist
   * @param  Integer $id
   * @return Response 
   */
  public function getRemovefromwishlist($id)
  {
    Auth::user()->wishlist()->detach($id);
    return Redirect::to('store/wishlist');
  }
  
}