<?php

namespace App\Http\Repository\Interfaces;

interface UserRepositoryInterface
{
    public function loginUser(array $credentials);
    public function addUser(array $data);
    public function getUser($key,$value);
    public function login($user);
    public function logout();

}
