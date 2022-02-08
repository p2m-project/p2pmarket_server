<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericController extends ApiController
{
  private $model;
  private $postRules;
  private $putRules;

  public function __construct($modelClass, callable $postRules, callable $putRules)
  {
    $this->model = $modelClass;
    $this->postRules = $postRules;
    $this->putRules = $putRules;
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  protected function index()
  {
    $data = $this->model::all();
    return $this->showAll($data);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = ($this->postRules)($request);
    $fields = $request->validate($rules);
    $instance = $this->model::create($fields);

    return $this->showOne($instance, 201);
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $instance = $this->model::findOrFail($id);
    return $this->showOne($instance);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $rules = ($this->putRules)($request, $id);
    $fields = $request->validate($rules);
    $instance = $this->model::findOrFail($id);

    $instance->fill($fields);

    if ($instance->isClean()) {
      return $this->showUnchangedError();
    }

    $instance->save();

    return $this->showOne($instance);
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $instance = $this->model::findOrFail($id);
    $instance->delete();
    return $this->showOne($instance);
  }
}
