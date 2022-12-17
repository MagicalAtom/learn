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
        $router->patch('courses/{course}/accept',[\mswco\Courses\Http\Controllers\CourseController::class,'accept'])
        ->name('courses.accept');
    $router->patch('reject/{course}/reject',[\mswco\Courses\Http\Controllers\CourseController::class,'reject'])
        ->name('courses.reject');
    $router->patch('lock/{course}/lock',[\mswco\Courses\Http\Controllers\CourseController::class,'lock'])
        ->name('courses.lock');
    $router->get('/course/{course}/detail',[\mswco\Courses\Http\Controllers\CourseController::class,'details'])->name('courses.details');

    });
//Route::view('/route','Courses::create');
