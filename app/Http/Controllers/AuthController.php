<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'username' => 'required|max:45|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($fields);

        $token = $user->createToken($request->username);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(){

        return 'login';

    }

    public function logout(){

        return 'logout';
        
    }
}
