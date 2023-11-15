<?php

use App\Http\Controllers\{
    CategoryController,
    DashboardController,
    PostController,
    ServiceController,
    SettingController
};
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'middleware' => ['auth', 'role:admin'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    //Kategori
    Route::get('category/data', [CategoryController::class, 'data'])->name('category.data');
    Route::resource('category', CategoryController::class);
    Route::get('/ajax/category/search', [CategoryController::class, 'search'])->name('category.search');

    // Post
    Route::get('post/data', [PostController::class, 'data'])->name('post.data');
    Route::resource('post', PostController::class);

    //Service
    Route::get('service/data', [ServiceController::class, 'data'])->name('service.data');
    Route::resource('service', ServiceController::class);

    // Setting
    Route::resource('setting', SettingController::class);
    Route::put('/setting/{setting}', [SettingController::class, 'update'])
        ->name('setting.update');
});
