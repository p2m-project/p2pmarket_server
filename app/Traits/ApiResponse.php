<?php

namespace App\Traits;

trait ApiResponse
{
  private function successResponse($data, $code)
  {
    return response()->json($data, $code);
  }

  protected function errorResponse($message, $code)
  {
    return response()->json(["message" => $message], $code);
  }

  private function transformData($data, $transformer)
  {
    $transformation = fractal($data, new $transformer);

    return $transformation->toArray();
  }

  protected function showAll($collection, $code = 200)
  {
    if ($collection->isEmpty()) {
      return $this->successResponse(['data' => $collection], $code);
    }

    $transformer = $collection->first()->transformer;

    $collection = $this->transformData($collection, $transformer);

    return $this->successResponse($collection, $code);
  }

  protected function showOne($instance, $code = 200)
  {
    $transformer = $instance->transformer;
    $instance = $this->transformData($instance, $transformer);
    return $this->successResponse($instance, $code);
  }
}
