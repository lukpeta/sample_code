<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }
}
