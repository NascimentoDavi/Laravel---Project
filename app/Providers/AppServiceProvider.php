<?php

namespace App\Providers;

use App\Repositories\{
    SupportRepositoryInterface,
    SupportEloquentORM
};
use Illuminate\Support\ServiceProvider;
use SupportEloquentORM as GlobalSupportEloquentORM;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Onde a interface for encontrada, utilizar a seguinte classe concreta.
        $this->app->bind(SupportRepositoryInterface::class, GlobalSupportEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
