<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Partners\SellerController;
use App\Http\Controllers\Products\ProductCategoryClassificationController;
use App\Http\Controllers\Products\ProductCategoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\ProductImageController;
use App\Http\Controllers\Products\ProductPricingController;
use App\Http\Controllers\Products\ProductSubCategoryController;
use App\Http\Controllers\Products\VariantTypeController;
use App\Http\Controllers\Products\VariantValueController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
  // auth

  // TODO: Ensure all these endpoints check if the user being pointed to is the currently logged in user
  Route::get('/users', [UserController::class, 'index'])->name('users.index');

  Route::resource('users', UserController::class)->only([
    "show", "update", "destroy"
  ]);


  Route::resource('products', ProductController::class)->except([
    "create", "edit"
  ]);

  Route::resource('productCategories', ProductCategoryController::class)->except([
    "create", "edit"
  ]);

  Route::resource('productSubCategories', ProductSubCategoryController::class)->except([
    "create", "edit"
  ]);

  Route::resource('productCatClassifications', ProductCategoryClassificationController::class)->except([
    "create", "edit"
  ]);

  // access via host:port/img/name.ext
  Route::resource('productImages', ProductImageController::class)->except([
    "create", "edit"
  ]);

  Route::resource('productPricings', ProductPricingController::class)->except([
    "create", "edit"
  ]);

  Route::resource('variantTypes', VariantTypeController::class)->except([
    "create", "edit"
  ]);

  Route::resource('variantValues', VariantValueController::class)->except([
    "create", "edit"
  ]);

  Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
  Route::get('auth/show', [AuthController::class, 'show'])->name('auth.user');
});

Route::resource('sellers', SellerController::class)->except([
  "create", "edit"
]);

Route::post('auth/register', [UserController::class, 'store'])->name('auth.register');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
