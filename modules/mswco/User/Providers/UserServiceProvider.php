<?php

namespace mswco\User\Providers;

use Illuminate\Support\ServiceProvider;
use mswco\User\MiddleWares\IpStoreMiddleware;


class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
config()->set('auth.providers.users.model',\mswco\User\Models\User::class);

    }


    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/user_routes.php");
        $this->loadMigrationsFrom(__DIR__ . "/../DataBase/Migrations");
        $this->loadViewsFrom(__DIR__ . "/../Resources/Views",'User');
        $this->loadFactoriesFrom(__DIR__ . "/../DataBase/Factory");
        $this->app['router']->pushMiddlewareToGroup('web',IpStoreMiddleware::class);
        config()->set('sidebar.items.users', [
            "icon" => "i-users",
            "title" => "مدیریت کاربران",
            "url" => route('users.index'),
        ]);

    }

}
