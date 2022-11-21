<?php

use Illuminate\Support\Facades\Route;


Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/test',function (){
    return new \mswco\User\Mail\VerifyCodeMail();
});

//Route::get('/verify-link/{user_id}',function (){
//
//if (request()->hasValidSignature()){
//    return 'dorost';
//}else{
//    return  'ghalat';
//}
//
//})->name('verify-link-ok');
//
//
//Route::get('/test',function (){
//   $dd = URL::temporarySignedRoute('verify-link-ok',now()->addMinute(1),['user_id'=>2]);
//
//    dd($dd);
//
//});
