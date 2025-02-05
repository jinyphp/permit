<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$prefix = prefix('admin');

## 인증 Admin
Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
->name('admin.permit')
->prefix($prefix.'/permit')->group(function () {

    Route::get('/',[
        \Jiny\Permit\Http\Controllers\Admin\AdminUserRole::class,
        "index"]);

    Route::resource('roles',\Jiny\Permit\Http\Controllers\Admin\RoleController::class);

    ## 설정
    Route::get('setting', [\Jiny\Permit\Http\Controllers\Admin\SettingController::class,"index"]);

});


/**
 * 인증 Admin
 */
Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
->name('admin.auth')
->prefix($prefix.'/auth')->group(function () {
    // 사용자 권한
    Route::get('/user/role/{id}',[
        \Jiny\Permit\Http\Controllers\Admin\AdminUserRole::class,
        'index'])->where('id','[0-9]+');
});


