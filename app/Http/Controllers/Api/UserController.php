<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FindUserRequest;
use App\Http\Requests\UpdateUser;
use App\Repositories\UserInterface;

class UserController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;

    }
    public function all()
    {
        try {
            return $this->user->all();
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }
    public function find($id)
    {
        try {
            if (!$id){
                return response()->json(['message' => 'id is required'], 404);
            }
            return $this->user->find($id);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function update(UpdateUser $request, $id)
    {
        try {
            if ( !$id ) {
                return response(['message' => 'id is required'], 404);
            }

            $user =  $this->user->update($request->all(),$id);
            if ($user){
                return response()->json(['message' => 'user updated successfully'], 200);
            }
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function delete($id)
    {
        try {
            if (!$id){
                return response()->json(['message' => 'id is required'], 404);
            }
            $user = $this->user->delete($id);
            if ($user){
                return response()->json(['message' => 'user deleted successfully'], 200);
            }
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
