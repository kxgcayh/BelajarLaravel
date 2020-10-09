<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
// Component
use App\View\Components\Card;
use App\View\Components\breadCrumb;

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
        // Component
        Blade::component('card', Card::class);
        Blade::component('breadCrumb', breadCrumb::class);
        // Include
        Blade::include('layouts.partials.topbar', 'topBar');
        Blade::include('layouts.partials.left-sidebar', 'leftSideBar');
        Blade::include('layouts.partials.footer', 'footer');
        Blade::include('layouts.partials.right-sidebar', 'rightSideBar');
        Blade::include('layouts.partials.footer-script', 'footerScript');
        Blade::include('includes.breadCrumbItem', 'breadCrumbItem');
        Blade::include('includes.breadCrumbActive', 'breadCrumbActive');
    }
}
