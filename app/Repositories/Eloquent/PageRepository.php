<?php

namespace App\Repositories\Eloquent;

use App\Models\Page;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PageRepositoryInterface;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
