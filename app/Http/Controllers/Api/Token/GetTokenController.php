<?php

namespace App\Http\Controllers\Api\Token;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class GetTokenController
{
    public function __construct()
    {
    }

    public function getToken(Request $request)
    {
        try{

            $ablities = [];

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

            if ($user->privilege_id == 1) {
                $ablities = ['has-full-access'];
            } else {
                $ablities = ['has-limited-access'];
            }


            return Response([
                'status'  => '200',
                'message' => 'success',
                'token'   => $user->createToken('access-token', $ablities)->plainTextToken
            ], 200);
        }
        catch(\Exception $ex){
            return Response([
                'status'  => 422,
                'message' => $ex->getMessage(),
            ], 200);
        }
    }

    public function checkTokenValid(Request $request)
    {
        $token = $request->bearerToken();
        if ($token) {
            $tokenModel = PersonalAccessToken::findToken($token);
            if ($tokenModel && $tokenModel->can('has-limited-access')) {
                return response()->json(['message' => 'Token is valid'], 200);
            }
        }

        return response()->json(['message' => 'Token is invalid'], 401);
    }
}
