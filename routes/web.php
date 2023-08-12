<?php

use App\Http\Controllers\PageController;
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
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/deleted', [PageController::class, 'deleted'])
            ->name('pages.deleted');
        Route::post('/deleted/{id}', [PageController::class, 'restore'])
            ->name('pages.restore');
        Route::resource('pages', PageController::class);
    });
});

Route::get('/{page}', [PageController::class, 'show'])->where('page', '.*');
