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

        $router->resource('seasons',\mswco\Courses\Http\Controllers\SeasonsController::class);
        $router->post('/seasons/{id}/create',[\mswco\Courses\Http\Controllers\SeasonsController::class,'store'])
        ->name('seasons.store');
        $router->put('/seasons/{id}/update',[\mswco\Courses\Http\Controllers\SeasonsController::class,'update'])->name('seasons.update');

    $router->patch('seasons/{seasons}/accept',[\mswco\Courses\Http\Controllers\SeasonsController::class,'accept'])
        ->name('seasons.accept');
    $router->patch('seasons/{seasons}/reject',[\mswco\Courses\Http\Controllers\SeasonsController::class,'reject'])
        ->name('seasons.reject');

});
