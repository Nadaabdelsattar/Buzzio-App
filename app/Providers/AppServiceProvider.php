<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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

    Paginator::useBootstrapFive();

    $topUsers = User::withCount('thought')->orderBy('thought_count','DESC')->limit(5)->get();

    View::share('topUsers', $topUsers );

    }
}
