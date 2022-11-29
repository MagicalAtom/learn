<?php

namespace mswco\Role\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
public function register()
{
    $this->loadMigrationsFrom(__DIR__ . "/../DataBase/Migrations");
    $this->loadViewsFrom(__DIR__ . "/../Resources/Views",'Role');
    $this->loadRoutesFrom(__DIR__ . "/../Routes/role_route.php");
    $this->loadJsonTranslationsFrom(__DIR__ . "/lang");
}
public function boot()
{
    config()->set('sidebar.items.role-permissions', [
        "icon" => "i-role-permissions",
        "title" => "نقش های کاربری",
        "url" => route('role.index'),
    ]);
}

}
