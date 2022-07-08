<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{

    protected $model;

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param array $columns
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function all(array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->orderBy($orderByColumnName, $orderBy);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->get($columns);
    }

    /**
     * @param $value
     * @param $key
     * @return mixed
     */
    public function pluck($value, $key = null)
    {
        $lists = $this->model->pluck($value, $key);

        if (!is_array($lists)) {
            $lists = $lists->all();
        }

        return $lists;
    }

    /**
     * @param array $data
     * @param int $id
     * @param string $attribute
     * @param array $with
     * @return mixed
     */
    public function update(array $data, int $id, string $attribute = 'id', array $with = []): mixed
    {
        return $this->model
            ->with($with)
            ->where($attribute, '=', $id)
            ->update($data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function find(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->find($id, $columns);
    }


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findOrFail(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->findOrFail($id, $columns);
    }


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
    public function findMany(array $ids, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->orderBy($orderByColumnName, $orderBy);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->findMany($ids, $columns);
    }


    /**
     * @param int $id
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findOrNew(int $id, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->findOrNew($id, $columns);
    }


    /**
     * @param string $attribute
     * @param string $value
     * @param array $columns
     * @param array $with
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function findBy(string $attribute, string $value, array $columns = ['*'], array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->where($attribute, '=', $value);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->first($columns);
    }


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
    public function findAllBy(string $attribute, string $value, array $columns = ['*'], string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->where($attribute, '=', $value)
            ->orderBy($orderByColumnName, $orderBy);


        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->get($columns);
    }


    /**
     * @param string $orderByColumnName
     * @param string $orderBy
     * @param array $with
     * @param int $perPage
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function paginate(string $orderByColumnName = 'id', string $orderBy = 'desc', array $with = [], int $perPage = 25, bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->orderBy($orderByColumnName, $orderBy);

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->paginate($perPage)->appends(request()->query());
    }


    /**
     * @param array $with
     * @param array $columns
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function last(array $with = [], array $columns = ['*'], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->orderBy('id', 'DESC');

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->first($columns);
    }


    /**
     * @param array $with
     * @param array $columns
     * @param bool $visible
     * @param bool $active
     * @return mixed
     */
    public function first(array $with = [], array $columns = ['*'], bool $visible = false, bool $active = false): mixed
    {
        $query = $this->model
            ->with($with)
            ->orderBy('id', 'ASC');

        if ($visible === true) {
            $query->where('visibility_date_from', '<=', now()->toDateString())
                ->where('visibility_date_to', '>=', now()->toDateString());
        }

        if ($active === true) {
            $query->where('is_enable', true);
        }

        return $query->first($columns);
    }

    /**
     * @return mixed
     */
    public function getModel(): mixed
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getMaxId(): mixed
    {
        return $this->model->max('id') ?? 0;
    }


    /**
     * @return void
     */
    public function truncate(): void
    {
        $this->model->truncate();
    }

}
