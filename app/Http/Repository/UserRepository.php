<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Repository\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
     private $model;
     public function __construct(User $model)
     {
         $this->model = $model;
     }

     public function loginUser(array $credentials)
     {
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
     }

     public function addUser(array $data)
     {
         return $this->model->create($data);
     }

     public function getUser($key,$value)
     {
         return $this->model->where($key,$value)->first();
     }

     public function login($user)
     {
         return Auth::login($user);
     }

     public function logout()
     {
         return Auth::logout();
     }
}

