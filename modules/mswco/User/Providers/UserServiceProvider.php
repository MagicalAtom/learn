<?php

namespace mswco\User\Providers;

use Illuminate\Support\ServiceProvider;


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

    }

}
