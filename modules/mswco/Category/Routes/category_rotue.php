<?php
Route::group(
    [
        'namespace' => 'mswco\Category\Http\Controllers',
        'middleware' => [
            'web',
            'auth',
            'verified'
        ]
    ],function (){
Route::resource('/category','CategoryController');
    });
