<?php

namespace App\Http\Controllers\Api\Token;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RevokeTokenController
{
    public function __construct()
    {
    }

    public function revoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ], [
            'email.required'    => 'You should enter email',
            'password.required' => 'Password is required',
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();

            $message = $errors->all()[0];

            $key = $errors->keys()[0];

            throw ValidationException::withMessages([
                $key => [$message],
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->tokens()->delete();

        return Response([
            'status'  => '200',
            'message' => 'Tokens revoked successfully',
        ], 200);
    }
}
