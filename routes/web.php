<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Permissions\AssignController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::get('/', HomeController::class)->name('home');
Route::middleware('has.role')->group(function()
{
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::prefix('navigation')->middleware('permission:create navigation')->group(function(){
        Route::get('create', [NavigationController::class, 'create'])->name('navigation.create');
        Route::post('create', [NavigationController::class, 'store']);
        Route::get('table', [NavigationController::class, 'table'])->name('navigation.table');
        Route::get('{navigation}/edit', [NavigationController::class, 'edit'])->name('navigation.edit');
        Route::put('{navigation}/edit', [NavigationController::class, 'update']);
        Route::delete('{navigation}/delete', [NavigationController::class, 'destroy'])->name('navigation.delete');

    });
    Route::middleware('permission:create post')->group(function(){
        Route::view('posts/create', 'posts.create');
        Route::view('posts/table', 'posts.table');
        Route::view('categories/create', 'categories.create');
        Route::view('categories/table', 'categories.table');
    });

    Route::prefix('role-and-permission')->namespace('Permission')->middleware('permission:assign permission')->group(function(){
        // Permission
        Route::get('assignable', [AssignController::class, 'create'])->name('assign.create');
        Route::post('assignable', [AssignController::class, 'store']);
        Route::get('assignable/{role}/edit', [AssignController::class, 'edit'])->name('assign.edit');
        Route::put('assignable/{role}/edit', [AssignController::class, 'update']);
        // User
        Route::get('assign/user', [UserController::class, 'create'])->name('assign.user.create');
        Route::post('assign/user', [UserController::class, 'store']);
        Route::get('assign/{user}/user', [UserController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign/{user}/user', [UserController::class, 'update']);
        Route::prefix('roles')->group(function(){
            Route::get('', [ RoleController::class, 'index'])->name('roles.index');
            Route::post('create', [ RoleController::class, 'store'])->name('roles.create');
            Route::get('{role}/edit', [ RoleController::class, 'edit'])->name('roles.edit');
            Route::put('{role}/edit', [ RoleController::class, 'update']);
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('roles.delete');
        });
        Route::prefix('permissions')->group(function(){
            Route::get('', [ PermissionController::class, 'index'])->name('permissions.index');
            Route::post('create', [ PermissionController::class, 'store'])->name('permissions.create');
            Route::get('{permission}/edit', [ PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('{Permission}/edit', [ PermissionController::class, 'update']);
        });
    });
});
Route::middleware('auth')->group(function()
{
    Route::post('/logout', LogoutController::class)->name('logout');
});

Route::middleware('guest')->group(function()
{
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::get('/test', function(){
    $roles = Role::class;
    $hasRole = auth()->user()->hasAnyRole($roles);
    dd($hasRole);
});

