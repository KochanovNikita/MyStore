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
})->name('welcome');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'subcategory'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Subcategory\IndexController::class)->name('admin.subcategory.index');
        Route::get('/create', \App\Http\Controllers\Admin\Subcategory\CreateController::class)->name('admin.subcategory.create');
        Route::post('/', \App\Http\Controllers\Admin\Subcategory\StoreController::class)->name('admin.subcategory.store');
        Route::get('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\ShowController::class)->name('admin.subcategory.show');
        Route::get('/{subcategory}/edit', \App\Http\Controllers\Admin\Subcategory\EditController::class)->name('admin.subcategory.edit');
        Route::patch('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\UpdateController::class)->name('admin.subcategory.update');
        Route::delete('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\DeleteController::class)->name('admin.subcategory.destroy');
    });

    Route::group(['prefix' => 'color'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Color\IndexController::class)->name('admin.color.index');
        Route::get('/create', \App\Http\Controllers\Admin\Color\CreateController::class)->name('admin.color.create');
        Route::post('/', \App\Http\Controllers\Admin\Color\StoreController::class)->name('admin.color.store');
        Route::get('/{color}', \App\Http\Controllers\Admin\Color\ShowController::class)->name('admin.color.show');
        Route::get('/{color}/edit', \App\Http\Controllers\Admin\Color\EditController::class)->name('admin.color.edit');
        Route::patch('/{color}', \App\Http\Controllers\Admin\Color\UpdateController::class)->name('admin.color.update');
        Route::delete('/{color}', \App\Http\Controllers\Admin\Color\DeleteController::class)->name('admin.color.destroy');
    });

    Route::group(['prefix' => 'company'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Company\IndexController::class)->name('admin.company.index');
        Route::get('/create', \App\Http\Controllers\Admin\Company\CreateController::class)->name('admin.company.create');
        Route::post('/', \App\Http\Controllers\Admin\Company\StoreController::class)->name('admin.company.store');
        Route::get('/{company}', \App\Http\Controllers\Admin\Company\ShowController::class)->name('admin.company.show');
        Route::get('/{company}/edit', \App\Http\Controllers\Admin\Company\EditController::class)->name('admin.company.edit');
        Route::patch('/{company}', \App\Http\Controllers\Admin\Company\UpdateController::class)->name('admin.company.update');
        Route::delete('/{company}', \App\Http\Controllers\Admin\Company\DeleteController::class)->name('admin.company.destroy');
    });
});
