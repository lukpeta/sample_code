<?php

namespace App\Repositories\Eloquent;

use App\Models\UserLoginHistory;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserLoginHistoryRepositoryInterface;

class UserLoginHistoryRepository extends BaseRepository implements UserLoginHistoryRepositoryInterface
{

    public function __construct(UserLoginHistory $model)
    {
        $this->model = $model;
    }
}
