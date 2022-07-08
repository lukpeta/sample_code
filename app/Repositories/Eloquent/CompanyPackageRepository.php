<?php

namespace App\Repositories\Eloquent;

use App\Models\CompanyPackage;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CompanyPackageRepositoryInterface;

class CompanyPackageRepository extends BaseRepository implements CompanyPackageRepositoryInterface
{

    public function __construct(CompanyPackage $model)
    {
        $this->model = $model;
    }
}
