<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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


Route::get('/',[\App\Http\Controllers\PageController::class,'index'])->name('index');
Route::get('/about',[\App\Http\Controllers\PageController::class,'about'])->name('about');
Route::get('/blog',[\App\Http\Controllers\PageController::class,'blog'])->name('blog');
Route::get('/services',[\App\Http\Controllers\PageController::class,'services'])->name('services');
Route::get('/contact',[\App\Http\Controllers\PageController::class,'contact'])->name('contact');
Route::get('/thank-you',[\App\Http\Controllers\PageController::class,'thankyou'])->name('thankyou');
Route::get('/shop',[\App\Http\Controllers\PageController::class,'shop'])->name('shop');
Route::get('/product/detail/{id}',[\App\Http\Controllers\PageController::class,'detail'])->name('detail');
Route::get('/product/order/{id}',[\App\Http\Controllers\PageController::class,'order'])->name('order');
Route::post('/product/order/store',[\App\Http\Controllers\PageController::class,'place_order'])->name('place.order');


// routes/web.php

Route::get('/cart', [\App\Http\Controllers\CartController::class,'index'])->name('cart.index');
Route::post('/add-to-cart',[\App\Http\Controllers\CartController::class,'addToCart'])->name('cart.add');



Route::get('/admin/dashboard',[\App\Http\Controllers\HomeController::class,'index'])->name('home')->middleware('auth','admin');

Route::get('/admin/crud/create',[\App\Http\Controllers\CrudController::class,'create'])->name('crud.create');
Route::post('/admin/crud/store',[\App\Http\Controllers\CrudController::class,'store'])->name('crud.store');
Route::get('/admin/crud',[\App\Http\Controllers\CrudController::class,'index'])->name('crud.index');
Route::get('/admin/crud/edit/{id}',[\App\Http\Controllers\CrudController::class,'edit'])->name('crud.edit');
Route::post('/admin/crud/update/{id}',[\App\Http\Controllers\CrudController::class,'update'])->name('crud.update');
Route::get('/admin/crud/delete/{id}',[\App\Http\Controllers\CrudController::class,'delete'])->name('crud.delete');

    //category
    Route::get('/admin/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/create/category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/store/category', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/edit/category/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/admin/update/category/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/delete/category/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.delete');


        //products
        Route::get('/admin/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('admin.products');
        Route::get('/admin/create/products', [\App\Http\Controllers\ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/admin/store/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/edit/products/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('admin.products.edit');
        Route::post('/admin/update/products/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/admin/delete/products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.products.delete');
    
        Route::get('/admin/order', [\App\Http\Controllers\OrderController::class, 'order'])->name('admin.order');
Route::get('logout', [AuthenticatedSessionController::class, 'logout'])
->name('logout');
require __DIR__.'/auth.php';
