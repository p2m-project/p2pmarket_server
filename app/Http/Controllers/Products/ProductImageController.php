<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\ApiController;
use App\Models\Products\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $productImages = ProductImage::all();
    return $this->showAll($productImages);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      "image" => "required|image",
      "type" => "required|string",
      "product_id" => "required|integer|exists:products,id",
    ];

    $request->validate($rules);

    $data = $request->all();
    $data['image'] = $request->image->store('', 'images');

    $productImage = ProductImage::create($data);

    return $this->showOne($productImage);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function show(ProductImage $productImage)
  {
    return $this->showOne($productImage);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ProductImage $productImage)
  {
    $rules = [
      "image" => "image",
      "type" => "string",
      "product_id" => "integer|exists:products,id",
    ];

    $request->validate($rules);

    $data = $request->all();

    $productImage->fill($request->only([
      "type",
      "product_id",
    ]));


    if ($request->hasFile('image')) {
      Storage::disk("images")->delete($productImage->image);
      $productImage->image = $request->image->store('', 'images');
    }

    if ($productImage->isClean()) {
      return $this->showUnchangedError();
    }

    $productImage->save();

    return $this->showOne($productImage);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Products\ProductImage  $productImage
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProductImage $productImage)
  {
    $productImage->delete();
    return $this->showOne($productImage);
  }
}
