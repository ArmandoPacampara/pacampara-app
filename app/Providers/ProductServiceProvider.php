<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProductService;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProductService::class, function ($app) {
            $products = [
                [
                    'id' => 1,
                    'name' => 'Apple',
                    'category' => 'fruit'
                ],
                [
                    'id' => 2,
                    'name' => 'Carrot',
                    'category' => 'vegetable'
                ],
                [
                    'id' => 3,
                    'name' => 'Banana',
                    'category' => 'fruit'
                ],
            ];
            return new ProductService($products);
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
