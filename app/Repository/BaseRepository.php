<?php

namespace App\Repository;

use App\Contract\BaseInterface;
use App\Contract\Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Shamaseen\Repository\Generator\Utility\Entity;

class BaseRepository implements BaseInterface
{

    public function insert(array $data = [])
    {
        // TODO: Implement insert() method.
    }

    public function update($entityId, array $data = [])
    {
        // TODO: Implement update() method.
    }

    public function delete($entityId)
    {
        // TODO: Implement delete() method.
    }

    public function find($entityId, array $columns = ['*'])
    {
        // TODO: Implement find() method.
    }

    public function findOrFail(int $entityId = 0, array $columns = ['*'])
    {
        // TODO: Implement findOrFail() method.
    }

    public function findBy(array $criteria = [], array $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

    public function paginate(int $limit = 10, array $criteria = [])
    {
        // TODO: Implement paginate() method.
    }

    public function simplePaginate(int $limit = 10, array $criteria = [])
    {
        // TODO: Implement simplePaginate() method.
    }

    public function get(array $criteria = [], array $columns = [])
    {
        // TODO: Implement get() method.
    }

    public function pluck(string $name = 'name', string $entityId = 'id', array $criteria = [])
    {
        // TODO: Implement pluck() method.
    }

    public function first(array $filter = [], array $columns = ['*'])
    {
        // TODO: Implement first() method.
    }

    public function create(array $data = [])
    {
        // TODO: Implement create() method.
    }

    public function createOrFirst(array $data = [])
    {
        // TODO: Implement createOrFirst() method.
    }

    public function createOrUpdate(array $data = [])
    {
        // TODO: Implement createOrUpdate() method.
    }

    public function entityName()
    {
        // TODO: Implement entityName() method.
    }

    public function trash()
    {
        // TODO: Implement trash() method.
    }

    public function withTrash()
    {
        // TODO: Implement withTrash() method.
    }

    public function restore(int $entityId = 0)
    {
        // TODO: Implement restore() method.
    }

    public function forceDelete(int $categoryId = 0)
    {
        // TODO: Implement forceDelete() method.
    }
}
