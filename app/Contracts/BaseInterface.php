<?php

namespace App\Contracts;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface BaseInterface
{
    /**
     * @param array $data
     *
     * @return bool
     */
    public function insert(array $data = []);

    /**
     * @param array $data
     * @param $entityId
     *
     * @return Model|bool
     */
    public function update($entityId, array $data = []);

    /**
     * @param $entityId
     *
     * @throws Exception
     *
     * @return bool
     */
    public function delete($entityId);

    /**
     * @param $entityId
     * @param array $columns
     *
     *  @return Model
     */
    public function find($entityId, array $columns = ['*']);

    /**
     * @param int $entityId
     * @param array $columns
     *
     *@return Model
     *@throws ModelNotFoundException
     *
     */
    public function findOrFail(int $entityId = 0, array $columns = ['*']);

    /**
     * @param array $criteria
     * @param array $columns
     *
     *  @return Model
     */
    public function findBy(array $criteria = [], array $columns = ['*']);

    /**
     * @param int $limit
     * @param array $criteria
     *
     * @return LengthAwarePaginator
     */
    public function paginate(int $limit = 10, array $criteria = []);

    /**
     * @param int $limit
     * @param array $criteria
     *
     * @return Paginator
     */
    public function simplePaginate(int $limit = 10, array $criteria = []);

    /**
     * @param array $criteria
     * @param array $columns
     *
     * @return LengthAwarePaginator
     */
    public function get(array $criteria = [], array $columns = []);

    /**
     * @param string $name
     * @param string $entityId
     * @param array $criteria
     *
     * @return array
     */
    public function pluck(string $name = 'name', string $entityId = 'id', array $criteria = []);

    /**
     * @param array $filter
     * @param array $columns
     *
     *  @return Model
     */
    public function first(array $filter = [], array $columns = ['*']);

    /**
     * @param array $data
     *
     * @return Model
     */
    public function create(array $data = []);

    /**
     * @param array $data
     *
     * @return Model
     */
    public function createOrFirst(array $data = []);

    /**
     * @param array $data
     *
     * @return Model
     */
    public function createOrUpdate(array $data = []);

    /**
     * Get entity name.
     *
     * @return string
     */
    public function entityName();

    public function trash();

    public function withTrash();

    /**
     * @param int $entityId
     *
     * @return bool
     */
    public function restore(int $entityId = 0);

    /**
     * @param int $id
     *
     * @return bool
     */
    public function forceDelete(int $id = 0);
}
