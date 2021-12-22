<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Repository\Interfaces\UserRepositoryInterface;

class LoginController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getLoginForm()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->except(['_token']);

        if ($this->repository->loginUser($credentials)) {
            // Authentication passed...
            return redirect('posts');
        }
        return redirect()->back()->with('msg','something went wrong');;
    }

    public function logout()
    {
        $this->repository->logout();
        return redirect('login');
    }
}
