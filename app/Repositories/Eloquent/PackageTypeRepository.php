<?php

namespace App\Repositories\Eloquent;

use App\Models\PackageType;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PackageTypeRepositoryInterface;

class PackageTypeRepository extends BaseRepository implements PackageTypeRepositoryInterface
{

    public function __construct(PackageType $model)
    {
        $this->model = $model;
    }
}
