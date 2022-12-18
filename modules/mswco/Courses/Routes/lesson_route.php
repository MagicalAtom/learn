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
    $router->get('/lesson/{id}/create',[\mswco\Courses\Http\Controllers\LessonsController::class,'create'])->name('lesson.create');
    $router->post('/lesson/{course}/create',[\mswco\Courses\Http\Controllers\LessonsController::class,'store'])->name('lessons.store');


});
