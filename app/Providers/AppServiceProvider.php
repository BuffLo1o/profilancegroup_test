<?php

namespace App\Providers;

use App\Services\Links\Contract\LinkGeneratorContract;
use App\Services\Links\LinkGenerator;
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
        $this->app->bind(LinkGeneratorContract::class, LinkGenerator::class);
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
