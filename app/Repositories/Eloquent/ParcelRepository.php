<?php

namespace App\Repositories\Eloquent;

use App\Models\Parcel;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ParcelRepositoryInterface;

class ParcelRepository extends BaseRepository implements ParcelRepositoryInterface
{

    public function __construct(Parcel $model)
    {
        $this->model = $model;
    }
}
