<?php

use App\Http\Controllers\{
    CategoryController,
    DashboardController,
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

    Route::resource('category', CategoryController::class);


    // Setting
    Route::resource('setting', SettingController::class);
    Route::put('/setting/{setting}', [SettingController::class, 'update'])
        ->name('setting.update');
});
