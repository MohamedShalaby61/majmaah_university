<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Repository\Interfaces\UserRepositoryInterface;

class SocialLoginController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function redirect($driver)
    {
        return Socialite::driver($driver)->redirect();

    }

    public function callback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
            $social_user = $this->repository->getUser('google_id', $user->id);
            if($social_user){
                $social_user->update([
                    'google_id' => $user->id
                ]);

            }else{
                $social_user = $this->repository->addUser([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make('123456')
                ]);
            }

            $this->repository->login($social_user);
            return redirect('/posts');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

