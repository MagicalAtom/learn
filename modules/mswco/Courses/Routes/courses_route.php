<?php
Route::group(
    [
//        'namespace' => '\mswco\Courses\Http\Controllers',
        'middleware' => [
            'web',
            'auth',
            'verified'
        ]
    ],function ($router){
  $router->resource('courses',\mswco\Courses\Http\Controllers\CourseController::class);
});
//Route::view('/route','Courses::create');
