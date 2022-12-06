<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Repositories\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function login(Request $request): \Illuminate\Http\Response
    {
        try {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken($request->get('email'))->plainTextToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = "Email or password is wrong!";
                return response($response, 422);
            }
        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }


}
