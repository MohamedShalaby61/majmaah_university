<?php

namespace App\Http\Repository\Interfaces;

interface PostRepositoryInterface
{
    public function authUserPosts($userId);
    public function addPost($data);
}
