<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password']
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ], 200);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return $this->responseLoginError();

        $user = User::where('email', $request['email'])->first();
        if (!$user) {
            return $this->responseLoginError();
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer'
        ], 200);
    }

    private function responseLoginError()
    {
        return response()->json([
            'message' => __('Invalid login details')
        ], 401);
    }

    public function me(Request $request)
    {
        dd( $request->user() );
    }
}
