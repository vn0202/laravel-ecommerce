<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')
    ->middleware(['auth', 'permission:view admin dashboard'])
    ->name('admin.')
    ->group(static function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home.index');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::post('/user/{user}/roles', \App\Http\Controllers\Admin\UserRoleController::class)->name(
            'users.roles.assign',
        );
        Route::post(
            '/users/{user}/permissions',
            \App\Http\Controllers\Admin\UserPermissionController::class,
        )->name('users.permissions.assign');
        Route::post(
            '/roles/{role}/permissions',
            \App\Http\Controllers\Admin\RolePermissionController::class,
        )->name('roles.permissions.assign');
        Route::resource('categories', \App\Http\Controllers\CategoryController::class);


    });

