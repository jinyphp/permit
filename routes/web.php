<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 지니어드민 패키지가 설치가 되어 있는 경우에만 실행
if(function_exists("isAdminPackage")) {

    // admin prefix 모듈 검사
    if(function_exists('admin_prefix')) {
        $prefix = admin_prefix();
    } else {
        $prefix = "admin";
    }

    ## 인증 Admin
    Route::middleware(['web','auth:sanctum', 'verified', 'admin'])
    ->name('admin.auth')
    ->prefix($prefix.'/auth')->group(function () {

        Route::resource('roles',\Jiny\Permit\Http\Controllers\Admin\RoleController::class);

        ## 설정
        Route::get('setting', [\Jiny\Permit\Http\Controllers\Admin\SettingController::class,"index"]);

    });
}
