<?php

namespace App\Http\Repository;

use App\Http\Repository\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    private $model;
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

  public function authUserPosts($userId)
  {
       return $this->model->where('user_id',$userId)->get();
  }

  public function addPost($data)
  {
      $data['user_id'] = auth()->user()->id;
      return $this->model->create($data);
  }

}

