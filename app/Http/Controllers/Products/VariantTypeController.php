<?php

namespace App\Http\Controllers\Products;


use App\Http\Controllers\GenericController;
use App\Models\Products\VariantType;


class VariantTypeController extends GenericController
{
  public function __construct()
  {
    parent::__construct(VariantType::class, [], []);
  }
}
