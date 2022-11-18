<?php
Route::group(['namespace'=>'mswco\User\Http\Controllers', 'middleware'=>'web'],function ($route){
    Auth::routes(['verify' => true]);
});


