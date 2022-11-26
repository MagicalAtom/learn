<?php

namespace mswco\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . "/../Resources/View",'Dashboard');
        $this->loadRoutesFrom(__DIR__ . "/../Routes/dashboard_route.php");
    }



}
