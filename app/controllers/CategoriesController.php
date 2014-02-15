<?php

class CategoriesController extends BaseController {

  public function __construct() {
    parent::__construct();
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('admin');
  }

  /**
   * Show all categories
   * @return Response
   */
  public function getIndex() {
    return View::make('categories.index')
      ->with('categories', Category::all());
  }

  /**
   * Create a new category
   * @return Response
   */
  public function postCreate() {
    $validator = Validator::make(Input::all(), Category::$rules);

    if($validator->passes()) {
      $category = new Category;
      $category->name = Input::get('name');
      $category->save();

      return Redirect::to('admin/categories/index')
        ->with('message', 'Category created!');
    }

    return Redirect::to('admin/categories/index')
      ->with('message', 'Something went wrong')
      ->withErrors($validator)
      ->withInput();
  }

  /**
   * Delete selected category
   * @return Response
   */
  public function postDestroy() {
    $category = Category::find(Input::get('id'));

    if($category) {

      $category->delete();

      return Redirect::to('admin/categories/index')
        ->with('message', 'Category deleted!');
    }

    return Redirect::to('admin/categories/index')
      ->with('message', 'Something went wrong. Try again!');
  }
}