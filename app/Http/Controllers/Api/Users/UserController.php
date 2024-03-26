<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\Privilege;
use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function __construct()
    {
    }

    public function me(Request $request)
    {
        $user        = $request->user();
        $user->image = url($user->image);

        $privilege = Privilege::find($user->privilege_id);

        return Response([
            'status'  => '200',
            'message' => 'User data retrieved successfully',
            'data'    => [
                'user'      => $user,
                'privilege' => $privilege
            ]
        ]);
    }

    public function all(Request $request)
    {
        $paginate = User::orderBy('id', 'desc')->paginate(5);

        return Response([
            'status'  => '200',
            'message' => 'Get List User successfully',
            'data'    => $paginate
        ]);
    }
}
