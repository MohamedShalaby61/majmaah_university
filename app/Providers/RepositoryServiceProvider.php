<?php

namespace App\Providers;

use App\Http\Repository\PostRepository;
use App\Http\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Http\Repository\Interfaces\PostRepositoryInterface;
use App\Http\Repository\Interfaces\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }


}
