<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Partners\SellerController;
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

  Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
  Route::get('auth/show', [AuthController::class, 'show'])->name('auth.user');
});

Route::resource('sellers', SellerController::class)->except([
  "create", "edit"
]);

Route::post('auth/register', [UserController::class, 'store'])->name('auth.register');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
