<?php

namespace App\Repositories\Eloquent;

use App\Models\Blog;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\BlogRepositoryInterface;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }
}
