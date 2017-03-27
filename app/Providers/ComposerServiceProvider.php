<?php

namespace App\Providers;

use App\Traits\ModelFinder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    use ModelFinder;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials._nav', 'articles.partials._formCreate'], function($view)
        {
            $categories = $this->getCategories();

            return $view->with(compact('categories'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
