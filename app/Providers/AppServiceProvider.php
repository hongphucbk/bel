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

        $this->app->singleton(
            \App\Repositories\News\NewsRepositoryInterface::class,
            \App\Repositories\News\NewsEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\News\Content\ContentRepositoryInterface::class,
            \App\Repositories\News\Content\ContentEloquentRepository::class
        );

        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserEloquentRepository::class
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
        view()->share('namePage', 'Industrial IOT');
    }


}
