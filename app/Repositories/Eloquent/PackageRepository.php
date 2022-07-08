<?php

namespace App\Repositories\Eloquent;

use App\Models\Package;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PackageRepositoryInterface;

class PackageRepository extends BaseRepository implements PackageRepositoryInterface
{

    public function __construct(Package $model)
    {
        $this->model = $model;
    }
}
