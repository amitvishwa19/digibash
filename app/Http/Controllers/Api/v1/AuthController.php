<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $register = $request->validate([
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
        $register['password'] = bcrypt($request->password);
        $user = User::create($register);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user ,'token' => $accessToken]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function users()
    {
        return User::all();
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
