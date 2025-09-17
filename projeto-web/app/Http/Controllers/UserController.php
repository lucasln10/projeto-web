<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use GuzzleHttp\Psr7\Request;

abstract class UserController
{
    private User $user;
    private Role $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function createUser(Request $request)
    {

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role = 'user';

        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }
}
