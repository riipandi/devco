<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Laravel Passport custom migration.
        Passport::ignoreMigrations();

        // Spatie Global Settings.
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });

        // Laravel Telescope local environemnt only.
        // if ($this->app->isLocal()) {
        //     $this->app->register(TelescopeServiceProvider::class);
        // }
    }
}
