<?php
Route::group(
[
    'namespace' => 'mscow\Dashboard\Http\Controllers',
    'middleware' => [
    'web',
    'auth',
    'verified'
    ]
],function (){
Route::get('/homepanel',[\mswco\Dashboard\Http\Controllers\DashboardController::class,'home'])
->name('home.panel');
});
