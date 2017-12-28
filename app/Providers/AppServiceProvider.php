<?php

namespace App\Providers;

use App\Gift;
use App\Tag;
use Illuminate\Support\ServiceProvider;
use App\Article;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.footer', function($view) {
            $view->with('archives', Article::archives());
            $view->with('tags',Tag::has('articles')->pluck('name'));
        });

//            view()->composer('gifts.wishList', function($view) {
//                $view->with('gifts', Gift::all());
//            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
