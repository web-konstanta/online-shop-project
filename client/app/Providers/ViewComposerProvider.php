<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.app', function (View $view) {
            $basketProducts = session()->get('basketProducts');
            $view->with([
                'categories' => Category::all(),
                'basketProductsCount' => $basketProducts ? array_sum($basketProducts) : 0
            ]);
        });

        Facades\View::composer('*', function (View $view) {
            $adminURL = env('ADMIN_URL');
            $view->with(['adminURL' => $adminURL]);
        });
    }
}
