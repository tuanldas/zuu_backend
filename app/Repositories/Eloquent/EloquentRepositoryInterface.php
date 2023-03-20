<?php

namespace App\Repositories\Eloquent;
interface EloquentRepositoryInterface
{
    public function getAll();

    public function getAllIntoTrash();

    public function paginate($perPage = 15);

    public function create($object);

    public function update($object);

    public function delete($id);

    public function find($id, $columns = ['*']);
}
