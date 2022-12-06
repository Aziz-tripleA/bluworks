<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserInterface
{
    public function all(): Collection;
    public function find($id): User;
    public function create(array $data): User;
    public function update(array $data, $id): bool;
    public function delete($id): bool;

}
