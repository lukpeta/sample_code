<?php

namespace App\Repositories\Eloquent\Interfaces;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $slug
     * @return mixed
     */
    public function findCompany(string $slug): mixed;

}
