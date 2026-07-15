<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return ApiResponse::success(
        $user,
        "User registered successfully",
        201
    );
}

  public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return ApiResponse::error("User Not Found", code: 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return ApiResponse::error("credentials are incorrect", code: 404);
        }

        $token = $user->createToken("api-token")->plainTextToken;
        $data['user'] = $user;
        $data['token'] = $token;
        return ApiResponse::success($data);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::success(message:"Logged Out");
    }
}
