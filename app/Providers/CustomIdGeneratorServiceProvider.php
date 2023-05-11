<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\CustomIdGenerator;

class CustomIdGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('custom-id-generator', function () {
            return new CustomIdGenerator();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
