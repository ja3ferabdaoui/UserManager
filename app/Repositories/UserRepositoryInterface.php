<?php

namespace App\Repositories;

/**
 * User management
 *
 * User: Jaafar Abdaoui
 * Date: 26/04/2019
 * Time: 00:16
 */
interface UserRepositoryInterface
{
    public function all(): object;

    public function create(array $data): object;

    public function update(array $data, $id): object;

    public function delete($id): int;

}