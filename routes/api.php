<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Partners\SellerController;
use Illuminate\Http\Request;
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
  Route::get('/users', [UserController::class, 'index'])->name('users.index');

  Route::resource('users', UserController::class)->only([
    "show", "update", "destroy"
  ]);

  Route::resource('sellers', SellerController::class)->except([
    "create", "edit"
  ]);
});

Route::post('auth/register', [UserController::class, 'store'])->name('auth.register');
