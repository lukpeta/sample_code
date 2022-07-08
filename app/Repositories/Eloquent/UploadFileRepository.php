<?php

namespace App\Repositories\Eloquent;

use App\Models\UploadFile;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UploadFileRepositoryInterface;

class UploadFileRepository extends BaseRepository implements UploadFileRepositoryInterface
{

    public function __construct(UploadFile $model)
    {
        $this->model = $model;
    }
}
