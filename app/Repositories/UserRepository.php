<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * User management
 *
 * User: Jaafar Abdaoui
 * Date: 26/04/2019
 * Time: 00:16
 */
class UserRepository implements UserRepositoryInterface
{
    // Model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get all instances of model
    public function all(): object
    {
        return $this->model->all();
    }

    // Create a new record in the database
    public function create(array $data): object
    {
        $data['password'] = bcrypt($data['email']);
        return $this->model->create($data);
    }

    // Update record in the database
    public function update(array $data, $id): object
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record;
    }

    // Remove record from the database
    public function delete($id): int
    {
        return $this->model->destroy($id);
    }

    // Get the associated model
    public function getModel(): object
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model): object
    {
        $this->model = $model;
        return $this;
    }


}