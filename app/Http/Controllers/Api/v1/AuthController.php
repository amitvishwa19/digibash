<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
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
        $user = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if(!Auth::attempt($user))
        {
            return response(['message' => 'Invalid login credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>Auth::user(),'token'=>$accessToken]);
    }

    public function users()
    {
        return User::all();
    }
}
