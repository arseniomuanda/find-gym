<?php

namespace App\Providers;


use App\Models\Categorias;
use Illuminate\Support\ServiceProvider;

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
        $caregorias = Categorias::all();
        view()->share('categorias', $caregorias);
    }
}
