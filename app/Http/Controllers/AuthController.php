<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)){
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name')->plainTextToken;
            return ApiResponse::success('Token creado', 200,  $token);
        } else {
            return ApiResponse::error ('Credenciales inválidas', 401);
        }
    }
}
