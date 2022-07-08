<?php

namespace App\Repositories\Eloquent;

use App\Models\Province;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ProvinceRepositoryInterface;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{

    public function __construct(Province $model)
    {
        $this->model = $model;
    }
}
