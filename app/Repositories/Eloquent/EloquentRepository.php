<?php

namespace App\Repositories\Eloquent;
abstract class EloquentRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getAllIntoTrash()
    {
        return $this->model->whereNotNull('deleted_at')->get();
    }

    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    public function create($object)
    {
        return $object->save();
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function update($object)
    {
        return $object->save();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }


}
