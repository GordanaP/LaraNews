<?php

namespace App\Providers;

use App\Traits\ModelFinder;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    use ModelFinder;

    /**
     * Share categories in tha navbar
     *
     * @return [type] [description]
     */
    public function composeNavbar()
    {
        View::composer('partials._nav', function($view)
        {
            $categories = $this->getCategories();

            $view->with(compact('categories'));
        });
    }


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        return $this->composeNavbar();
        //
    }
}
