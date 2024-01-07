<?php

use App\Http\Controllers\{
    AboutController,
    BannerController,
    CategoryController,
    DashboardController,
    GaleryController,
    PostController,
    ServiceController,
    SettingController,
    SubscriberController
};
use App\Http\Controllers\Front\{
    FrontController,
    FrontSubcriberController
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

Route::get('/', [FrontController::class, 'index']);
Route::post('/subscriber', [FrontSubcriberController::class, 'store']);
Route::get('/berita/{slug}', [FrontController::class, 'detailBlog'])->name('blog.detail');

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
    Route::resource('post', PostController::class)->except('edit');
    Route::get('post/{post}/detail', [PostController::class, 'detail'])->name('post.detail');

    //Service
    Route::get('service/data', [ServiceController::class, 'data'])->name('service.data');
    Route::resource('service', ServiceController::class);

    // Banner
    Route::get('banner/data', [BannerController::class, 'data'])->name('banner.data');
    Route::resource('banner', BannerController::class);

    // Banner
    Route::get('gallery/data', [GaleryController::class, 'data'])->name('gallery.data');
    Route::resource('gallery', GaleryController::class);

    // Subscriber
    Route::get('/subscriber/data', [SubscriberController::class, 'data'])
        ->name('subscriber.data');
    Route::resource('/subscriber', SubscriberController::class)->only('index', 'destroy');

    // About
    Route::get('/about/data', [AboutController::class, 'data'])
        ->name('about.data');
    Route::resource('/about', AboutController::class)->only('index', 'destroy', 'update', 'show');

    // Setting
    Route::resource('setting', SettingController::class);
    Route::put('/setting/{setting}', [SettingController::class, 'update'])
        ->name('setting.update');
});
