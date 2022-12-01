 <?php
Route::group(['namespace'=>'mswco\User\Http\Controllers', 'middleware'=>'web'],function ($route){
    Auth::routes(['verify' => true]);
    // email verification
    Route::post('/verify/email',[\mswco\User\Http\Controllers\Auth\VerificationController::class,'verify'])
    ->name('verification.verify');
    Route::post('/email/verify', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');

    // login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');

    // logout
    Route::any('/logout', 'Auth\LoginController@logout')->name('logout');

    // register
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
});


