<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Repositories\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function register(RegisterUser $request): \Illuminate\Http\Response
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);
            $user = $this->user->create($data);

            return response([
                'status' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);

        }catch (\Exception $e) {
            Log::error($e->getMessage());
            return response([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
