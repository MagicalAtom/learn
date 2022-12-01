<?php

namespace mswco\Courses\Providers;

use Illuminate\Support\ServiceProvider;

class CoursesServiceProvider extends ServiceProvider
{
public function register()
{
    $this->loadRoutesFrom(__DIR__ . "/../Routes/courses_route.php");
    $this->loadViewsFrom(__DIR__  . "/../Resources/Views" , "Courses");
    $this->loadMigrationsFrom(__DIR__ . "/../DataBase/Migrations");
}
public function boot(){
    config()->set('sidebar.items.courses', [
        "icon" => "i-courses",
        "title" => "دوره ها",
        "url" => route('courses.index')
    ]);
}

}
