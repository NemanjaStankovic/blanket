<?php

namespace App\Providers;

use App\Models\BlanketPitanje;
use App\Services\BiracPitanjaSaPonavljanjem;
use App\Services\BlanketGeneratorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BiracPitanjaSaPonavljanjem::class, function ($app) {
            return new BiracPitanjaSaPonavljanjem();
        });

        $this->app->singleton(BlanketGeneratorService::class, function ($app) {

            $blanketPitanja = $app->make(BiracPitanjaSaPonavljanjem::class);
            return new BlanketGeneratorService($blanketPitanja);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
