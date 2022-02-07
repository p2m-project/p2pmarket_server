<?php

namespace App\Http\Controllers;

class GenericController extends ApiController
{
  private $model;
  public function __construct($modelClass)
  {
    $this->model = new $modelClass;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = $this->model::all();
    return $this->showAll($data);
  }
}
