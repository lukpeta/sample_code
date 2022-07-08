<?php

namespace App\Repositories\Eloquent\Interfaces;


interface BaseRepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed;


    /**
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function all(array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed;

    /**
     * @param $value
     * @param $key
     * @return mixed
     */
    public function pluck($value, $key = null);

    /**
     * @param array $data
     * @param int $id
     * @param string $attribute
     * @param array $with
     * @return mixed
     */
    public function update(array $data, int $id, string $attribute = 'id', array $with = []): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function find(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed;


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findOrFail(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed;

    /**
     * @param array $ids
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findMany(array $ids, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed;


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findOrNew(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed;


    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findBy(string $attribute, string $value, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed;

    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findAllBy(string $attribute, string $value, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed;


    /**
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param int $perPage
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function paginate(string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], int $perPage = 25, bool $visible = false, bool $active = false): mixed;


    /**
     * @param array $with
     * @param array $columns
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function last(array $with = [], array $columns = ['*'], bool $visible = false, bool $active = false): mixed;


    /**
     * @param array $with
     * @param array $columns
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function first(array $with = [], array $columns = ['*'], bool $visible = false, bool $active = false): mixed;

    /**
     * @return mixed
     */
    public function getModel(): mixed;

    /**
     * @return mixed
     */
    public function getMaxId(): mixed;

    /**
     * @return void
     */
    public function truncate(): void;
}
