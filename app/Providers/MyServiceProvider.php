<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductReviews;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\CartRepository;
use App\Repositories\Interfaces\AddProductToCartRepositoryInterface;
use App\Repositories\OrdersRepository;
use App\Repositories\ProductReviewsRepository;
use App\Repositories\ProductsRepository;
use App\Services\CartServices;
use App\Services\Interfaces\CartServicesInterfaces;
use App\Services\Interfaces\OrdersServicesInterfaces;
use App\Services\Interfaces\ProductReviewsServicesInterfaces;
use App\Services\OrdersServices;
use App\Services\ProductReviewsServices;
use App\Services\ProductsServices;
use App\Services\Interfaces\AuthServicesInterfaces;
use App\Services\AuthServices;
use App\Services\Interfaces\ProductsServicesInterfaces;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthServicesInterfaces::class, function ($app) {
            return new AuthServices(new AuthRepository(new User()));
        });

        $this->app->bind(ProductsServicesInterfaces::class, function ($app) {
            return new ProductsServices(new ProductsRepository(new Product()));
        });

        $this->app->bind(ProductReviewsServicesInterfaces::class, function ($app) {
            return new ProductReviewsServices(new ProductReviewsRepository(new ProductReviews()));
        });

        $this->app->bind(CartServicesInterfaces::class, function ($app) {
            return new CartServices(new CartRepository(new Cart()));
        });

        $this->app->bind(OrdersServicesInterfaces::class, function ($app) {
            return new OrdersServices(new OrdersRepository(new Orders()));
        });
    }
}
