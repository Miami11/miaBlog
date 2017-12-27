<?php

namespace App\Providers;

use App\Tag;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use App\Article;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Article' => 'App\Policies\ArticlePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update', function ($user, $article) {
            return $user->id == $article->user_id;
        });

        Gate::define('canLike',function ($user, $article) {
            return $user->id !== $article->user_id;
        });
     view()->composer('layouts.footer', function($view) {
         $view->with('archives', Article::archives());
         $view->with('tags',Tag::has('articles')->pluck('name'));
     });
    }

}
