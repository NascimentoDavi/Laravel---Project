<?php

namespace App\Providers;

/**
 * Classe responsável por configurar e injetar as dependências dentro da aplicação Laravel.
 */

use App\Repositories\{ SupportRepositoryInterface, SupportEloquentORM };
use Illuminate\Support\{ ServiceProvider };

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Onde a interface for encontrada, utilizar a seguinte classe concreta.
        $this->app->bind(SupportRepositoryInterface::class, SupportEloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
