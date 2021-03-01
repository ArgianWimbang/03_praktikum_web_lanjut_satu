<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
@@ -13,10 +18,27 @@
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//1. Halaman Home (routes biasa)
Route::get('/', [HomeController::class, 'index'])->name('home');

//2. Halaman produk (routes prefix)
Route::prefix('/product')->group(function(){
    Route::get('/product', [ProductController::class, 'index'])->name('product');
});

//3. Halaman News (routes parameter)
Route::get('/news/{title}', [NewsController::class, 'index'])->name('news');

//4. Halaman Program (routes prefix)
Route::prefix('program')->group(function () {
    Route::get('/karir', [ProgramController::class, 'karir']);
    Route::get('/magang', [ProgramController::class, 'magang']);
    Route::get('/kunjungan-industri', [ProgramController::class, 'kunjunganindustri']);
});

//5. Halaman About-us (routes biasa)
Route::get('/about-us', [AboutController::class, 'index'])->name('about');

//6. Halaman contact-us (routes resource only)
Route::resource('/contact-us', ContactController::class,['only' => ['index'] ]);