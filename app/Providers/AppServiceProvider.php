<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Schema;

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
    // Only share categories if the table exists
    if (Schema::hasTable('categorias')) {
        view()->share('categorias', Categoria::all());
    }
    Route::aliasMiddleware('admin', AdminMiddleware::class);
}
}
