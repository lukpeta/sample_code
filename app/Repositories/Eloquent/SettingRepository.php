<?php

namespace App\Repositories\Eloquent;

use App\Models\Setting;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\SettingRepositoryInterface;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }
}
