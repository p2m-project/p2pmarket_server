<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends ApiController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return $this->showAll($users);
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
      "name" => "required|string",
      "email" => "required|string|email|unique:users,email",
      "password" => "required|string|confirmed"
    ];

    $fields = $request->validate($rules);
    $user = User::create([
      "name" => $fields["name"],
      "email" => $fields["email"],
      "password" => $fields["password"],
    ]);

    $token = $user->createToken("authtoken")->plainTextToken;

    $response = [
      "user" => $user,
      "token" => $token
    ];

    return response($response, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    return $this->showOne($user, 201);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $rules = [
      "name" => "string",
      "email" => ["string", "email", Rule::unique("users", "email")->ignore($user->id)],
      "password" => "string|confirmed"
    ];

    $request->validate($rules);
    $user->fill($request->only([
      "name",
      "email",
      "password",
    ]));

    if ($user->isClean()) {
      return $this->showUnchangedError();
    }

    $user->save();

    return $this->showOne($user, 201);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->tokens()->delete();

    $user->delete();

    return $this->showOne($user, 201);
  }
}
