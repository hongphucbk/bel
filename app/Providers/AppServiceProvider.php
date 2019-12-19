<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Soft\SoftRepositoryInterface::class,
            \App\Repositories\Soft\SoftEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Soft\Content\ContentRepositoryInterface::class,
            \App\Repositories\Soft\Content\ContentEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\Soft\Attach\AttachRepositoryInterface::class,
            \App\Repositories\Soft\Attach\AttachEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }


}
