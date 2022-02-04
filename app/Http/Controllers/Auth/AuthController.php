<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
  /**
   * Show the logged in user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    $user = $request->user();

    return $this->showOne($user);
  }

  /**
   * Log in a user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    $rules = [
      "email" => "required|string|email",
      "password" => "required|string"
    ];

    $fields = $request->validate($rules);

    $user = User::where('email', $fields["email"])->first();
    if (!$user || !Hash::check($fields['password'], $user->password)) {
      return $this->errorResponse('invalid credentials', 401);
    }

    $token = $user->createToken('authtoken')->plainTextToken;
    $response = [
      "user" => $user,
      "token" => $token
    ];

    return response($response, 200);
  }

  /**
   * Logout a user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    $request->user()->tokens()->delete();


    $response = [
      "message" => "logged out"
    ];

    return response($response);
  }
}
