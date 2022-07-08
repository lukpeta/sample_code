<?php

namespace App\Repositories\Eloquent;

use App\Models\UserCompanySetting;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserCompanySettingRepositoryInterface;

class UserCompanySettingRepository extends BaseRepository implements UserCompanySettingRepositoryInterface
{

    public function __construct(UserCompanySetting $model)
    {
        $this->model = $model;
    }
}
