<?php

namespace App\Providers;

use App\Http\Controllers\Log\Contracts\LogInterface;
use App\Http\Controllers\Log\Repositories\LogRepository;
use App\Http\Controllers\Todo\Contracts\TodoInterface;
use App\Http\Controllers\Todo\Repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TodoInterface::class,
            TodoRepository::class
        );
        $this->app->bind(
            LogInterface::class,
            LogRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
