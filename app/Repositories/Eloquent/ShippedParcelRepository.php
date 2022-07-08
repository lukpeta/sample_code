<?php

namespace App\Repositories\Eloquent;

use App\Models\ShippedParcel;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ShippedParcelRepositoryInterface;

class ShippedParcelRepository extends BaseRepository implements ShippedParcelRepositoryInterface
{

    public function __construct(ShippedParcel $model)
    {
        $this->model = $model;
    }
}
