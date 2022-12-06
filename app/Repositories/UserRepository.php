<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserInterface
{
    public function all(): Collection
    {
        return User::all();
    }
    public function create(array $data): User
    {
        return User::create($data);
    }
    public function delete($id): bool
    {
        return User::destroy($id);
    }
    public function find($id) : User
    {
        return User::findOrFail($id);
    }
    public function update(array $data, $id): bool
    {
        return User::where('id', $id)->update($data);
    }





}
