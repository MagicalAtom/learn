<?php

namespace mswco\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/category_rotue.php");
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views",'Categories');
        $this->loadMigrationsFrom(__DIR__ . "/../DataBase/Migrations");
    }


    public function boot()
    {
        config()->set('sidebar.items.categories', [
            "icon" => "i-categories",
            "title" => "دسته بندی ها",
            "url" => route('category.index'),
        ]);
    }


}
