<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use App\Services\SmsService;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function findCompany(string $slug): mixed
    {
        return $this->model
            ->where('slug',  $slug)
            ->where('is_enable', true)
            ->where('is_company', true)
            ->with(['mainImage', 'companyDetails'])
            ->firstOrFail();
    }

}
