<?php

namespace Convene\Providers;

use Convene\View\ViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory as ViewFactory;

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
     * @param \Illuminate\View\Factory $view
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('*', ViewComposer::class);
    }
}
