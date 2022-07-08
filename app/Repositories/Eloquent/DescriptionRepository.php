<?php

namespace App\Repositories\Eloquent;

use App\Models\Description;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\DescriptionRepositoryInterface;

class DescriptionRepository extends BaseRepository implements DescriptionRepositoryInterface
{

    public function __construct(Description $model)
    {
        $this->model = $model;
    }
}
