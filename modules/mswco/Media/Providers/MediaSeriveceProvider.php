<?php

namespace mswco\Media\Providers;

use Illuminate\Support\ServiceProvider;

class MediaSeriveceProvider extends ServiceProvider
{

public function register()
{
    $this->loadMigrationsFrom(__DIR__ . "/../DataBase/Migrations");
    $this->loadViewsFrom(__DIR__ . "/../Resources/Views",'Media');
    $this->loadRoutesFrom(__DIR__ . "/../Routes/media_routes.php");
}
public function boot(){

}

}
