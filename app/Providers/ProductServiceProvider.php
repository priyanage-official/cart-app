<?php

namespace App\Providers;

use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.navbar', function ($view) {
            $product = Product::whereHas('users', function ($query) {
                $query->where('id',  Auth::user()->id);
            })->pluck('id')->toArray();

            $view->with('userCartProduct', $product);
        });
    }
}
