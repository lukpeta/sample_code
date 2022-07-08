<?php

namespace App\Repositories\Eloquent;

use App\Models\Slide;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\SlideRepositoryInterface;

class SlideRepository extends BaseRepository implements SlideRepositoryInterface
{

    public function __construct(Slide $model)
    {
        $this->model = $model;
    }
}
