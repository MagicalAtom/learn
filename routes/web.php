<?php

use Illuminate\Support\Facades\Route;


Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
//
//Route::get('/test',function (){
//    return new \mswco\User\Mail\VerifyCodeMail();
//});
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
////});
//Route::get('/test',function (){
////\Spatie\Permission\Models\Permission::create(['name'=>'manage role_permissions']);
//auth()->user()->givePermissionTo('manage role_permissions');
//return auth()->user()->permission;
//});
Route::get('/logout',function (){
\Illuminate\Support\Facades\Auth::logout();
});
