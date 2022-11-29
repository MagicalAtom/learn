<?php
Route::group(["namespace" => "mswco\Role\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('role', \mswco\Role\Http\Controllers\RoleController::class)->middleware('permission:manage role_permissions');
});
