<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Post;
use function foo\func;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('archives', Post::archive());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // registering service container
        $this->app->singleton(Stripe::class, function (){
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });
    }
}
