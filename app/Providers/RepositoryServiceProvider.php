<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Modules\PageCreation\Repository\Eloquent\PageRepository;
use Modules\PageCreation\Repository\PageRepositoryInterface;
use Modules\Users\Repository\UserRepositoryInterface;
use Modules\Users\Repository\Eloquent\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
