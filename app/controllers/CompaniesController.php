<?php

class CompaniesController extends BaseController {

  public function __construct() {
    parent::__construct();
    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('admin');
  }

  /**
   * Show all companies
   * @return Response
   */
  public function getIndex() {
    return View::make('companies.index')
      ->with('companies', Company::all());
  }

  /**
   * Create a new company
   * @return Response
   */
  public function postCreate() {
    $validator = Validator::make(Input::all(), Company::$rules);

    if($validator->passes()) {
      $company = new Company;
      $company->name = Input::get('name');
      $company->save();

      return Redirect::to('admin/companies/index')
        ->with('message', 'Company created!');
    }

    return Redirect::to('admin/companies/index')
      ->with('message', 'Something went wrong')
      ->withErrors($validator)
      ->withInput();
  }

  /**
   * Delete selected company
   * @return Response
   */
  public function postDestroy() {
    $company = Company::find(Input::get('id'));

    if($company) {

      $company->delete();

      return Redirect::to('admin/companies/index')
        ->with('message', 'Company deleted!');
    }

    return Redirect::to('admin/companies/index')
      ->with('message', 'Something went wrong. Try again!');
  }
}