<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('homepage');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/admin', function () {
        return redirect('/admin/dashboard');
    });

    Route::prefix('admin')->group(function () {

        Route::get('/welcome', function () {
            return view('welcome');
        })->name('welcome');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('pages')->group(function () {

            Route::get('/deleted', [PageController::class, 'deleted'])
                ->name('pages.deleted');

            Route::post('/deleted/{id}', [PageController::class, 'restore'])
                ->name('pages.restore');

        });

        Route::prefix('components')->group(function () {

            Route::get('/deleted', [ComponentController::class, 'deleted'])
                ->name('components.deleted');

            Route::post('/deleted/{id}', [ComponentController::class, 'restore'])
                ->name('components.restore');

        });

        Route::resource('pages', PageController::class);

        Route::resource('components', ComponentController::class);

        Route::resource('media', MediaController::class);

        Route::resource('users', UserManagementController::class);

        Route::resource('navigation', NavigationController::class);

    });
});

Route::get('/{page}', [PageController::class, 'show'])->where('page', '.*');
