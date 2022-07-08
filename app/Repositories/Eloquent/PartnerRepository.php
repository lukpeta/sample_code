<?php

namespace App\Repositories\Eloquent;

use App\Models\Partner;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PartnerRepositoryInterface;

class PartnerRepository extends BaseRepository implements PartnerRepositoryInterface
{

    public function __construct(Partner $model)
    {
        $this->model = $model;
    }
}
