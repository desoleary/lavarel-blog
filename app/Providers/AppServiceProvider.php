<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Post;
use App\Tag;
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
            $archives = Post::archive();
            $tags = Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
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
