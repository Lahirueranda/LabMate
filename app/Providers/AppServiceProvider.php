<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< Updated upstream
=======
use Illuminate\Support\Facades\Schema;
>>>>>>> Stashed changes

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
<<<<<<< Updated upstream
=======
        Schema::defaultStringLength(191);
>>>>>>> Stashed changes
    }
}
