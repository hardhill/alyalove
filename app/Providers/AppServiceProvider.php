<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->actiVeLinks();
    }

    public function actiVeLinks()
    {
        View::composer('layouts.app', function ($view){
            $view->with('mainLink',request()->is('/')?'menu-link__active':'');
            $view->with('articlesLink',(request()->is('articles') or request()->is('articles/*'))?'menu-link__active':'');
        });
    }
}
