<?php

namespace App\Providers;

use App\Repository\Admin\Banner\BannerRepository;
use App\Repository\Admin\Banner\BannerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    }
}
