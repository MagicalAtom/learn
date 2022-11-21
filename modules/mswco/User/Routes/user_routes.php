<?php
Route::group(['namespace'=>'mswco\User\Http\Controllers', 'middleware'=>'web'],function ($route){
    Auth::routes(['verify' => true]);
    Route::post('/verify/email',[\mswco\User\Http\Controllers\Auth\VerificationController::class,'verify'])
    ->name('verification.verify');
});


