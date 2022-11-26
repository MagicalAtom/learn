<?php

namespace mswco\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/category_rotue.php");
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views",'Categories');
    }


}
