<?php

use App\Http\Controllers\Auth\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/test', function () {
  return ["message" => "hello world"];
});

Route::group(['middleware' => ['auth:sanctum']], function () {
  // auth
  Route::get('/users', [UserController::class, 'index'])->name('users.index');
  Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
  Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});

Route::post('auth/register', [UserController::class, 'store'])->name('auth.register');
