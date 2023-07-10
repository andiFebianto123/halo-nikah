<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PopupController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\ApiCoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PackageProductController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RangePriceController;
use App\Http\Controllers\Admin\TopProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SliderBannerController;
use App\Http\Controllers\Admin\SpecialProductController;
use App\Http\Controllers\BlogController as BlogFrontend;
use App\Http\Controllers\VendorController as VendorFrontend;
use App\Http\Controllers\ProductController as ProductFrontend;

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

Route::get('/', function(){
    return redirect('home');
});

// Frontend
Route::get('home', [HomeController::class, 'index']);

// products
Route::get('products', [ProductFrontend::class, 'index']);
Route::get('products/{id}', [ProductFrontend::class, 'detail']);

// vendors
Route::get('vendors', [VendorFrontend::class, 'index']);
Route::get('vendors/{id}', [VendorFrontend::class, 'detail']);

// package
Route::get('package', [PackageProductController::class, 'index']);

// cart
Route::get('cart', [CartController::class, 'index']);
Route::get('cart/print', [CartController::class, 'print_struck']);

// blog
Route::get('blog', [BlogFrontend::class, 'index']);
Route::get('blog/{slug}', [BlogFrontend::class, 'detail']);
Route::get('blog/tag/{slug}', [BlogFrontend::class, 'tags']);

// API
Route::prefix('api')->group(function(){
    Route::name('api.')->group(function(){
        Route::post('get-product-detail', [ProductController::class, 'get_product'])->name('product');
        Route::get('print-invoice', [CartController::class, 'print_struck'])->name('print.invoice');
    });
});


// Backend
Route::prefix('admin')->group(function () {
    Route::middleware(['admin.signed:web'])->group(function () {
        // auth
        Route::get('login', [AuthController::class, 'index']);
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware(['admin.auth:web'])->group(function(){
        // logout
        Route::get('logout', [AuthController::class, 'logout']);

        // dashboard
        Route::get('/', [DashboardController::class, 'index']);

        // kategori
        Route::prefix('kategori')->group(function() {
            Route::get('/', [CategorieController::class, 'index']);
            Route::post('search', [CategorieController::class, 'search']);
            Route::get('create', [CategorieController::class, 'create']);
            Route::post('create', [CategorieController::class, 'store']);
            Route::get('{id}', [CategorieController::class, 'edit']);
            Route::post('{id}', [CategorieController::class, 'update']);
            Route::delete('{id}', [CategorieController::class, 'destroy']);
        });

        // vendor
        Route::prefix('vendor')->group(function() {
            Route::get('/', [VendorController::class, 'index']);
            Route::post('search', [VendorController::class, 'search']);
            Route::get('create', [VendorController::class, 'create']);
            Route::post('create', [VendorController::class, 'store']);
            Route::get('{id}', [VendorController::class, 'edit']);
            Route::post('{id}', [VendorController::class, 'update']);
            Route::delete('{id}', [VendorController::class, 'destroy']);
        });

        // product
        Route::prefix('product')->name('product.list')->group(function(){
            Route::get('/', [ProductController::class, 'index']);
            Route::post('search', [ProductController::class, 'search']);
            Route::get('create', [ProductController::class, 'create']);
            Route::post('create', [ProductController::class, 'store']);
            Route::get('{id}', [ProductController::class, 'edit']);
            Route::post('{id}', [ProductController::class, 'update']);
            Route::delete('{id}', [ProductController::class, 'destroy']);
        });

        // product Top
        Route::prefix('product-top')->name('product.top')->group(function(){
            Route::get('/', [TopProductController::class, 'index']);
            Route::post('search', [TopProductController::class, 'search']);
            Route::get('create', [TopProductController::class, 'create']);
            Route::post('create', [TopProductController::class, 'store']);
            Route::get('{id}', [TopProductController::class, 'edit']);
            Route::post('{id}', [TopProductController::class, 'update']);
            Route::delete('{id}', [TopProductController::class, 'destroy']);
        });

        // product special
        Route::prefix('product-special')->name('product.special')->group(function(){
            Route::get('/', [SpecialProductController::class, 'index']);
            Route::post('search', [SpecialProductController::class, 'search']);
            Route::get('create', [SpecialProductController::class, 'create']);
            Route::post('create', [SpecialProductController::class, 'store']);
            Route::get('{id}', [SpecialProductController::class, 'edit']);
            Route::post('{id}', [SpecialProductController::class, 'update']);
            Route::delete('{id}', [SpecialProductController::class, 'destroy']);
        });

        Route::prefix('widget-banner')->name('widget.banner')->group(function(){
            Route::get('/', [SliderBannerController::class, 'index']);
            Route::post('search', [SliderBannerController::class, 'search']);
            Route::get('create', [SliderBannerController::class, 'create']);
            Route::post('create', [SliderBannerController::class, 'store']);
            Route::get('{id}', [SliderBannerController::class, 'edit']);
            Route::post('{id}', [SliderBannerController::class, 'update']);
            Route::delete('{id}', [SliderBannerController::class, 'destroy']);
        });

        Route::prefix('widget-popup')->name('widget.popup')->group(function(){
            Route::get('/', [PopupController::class, 'index']);
            Route::post('search', [PopupController::class, 'search']);
            Route::get('create', [PopupController::class, 'create']);
            Route::post('create', [PopupController::class, 'store']);
            Route::get('{id}', [PopupController::class, 'edit']);
            Route::post('{id}', [PopupController::class, 'update']);
            Route::delete('{id}', [PopupController::class, 'destroy']);
        });

        Route::prefix('widget-testimonial')->name('widget.testimonial')->group(function(){
            Route::get('/', [TestimonialController::class, 'index']);
            Route::post('search', [TestimonialController::class, 'search']);
            Route::get('create', [TestimonialController::class, 'create']);
            Route::post('create', [TestimonialController::class, 'store']);
            Route::get('{id}', [TestimonialController::class, 'edit']);
            Route::post('{id}', [TestimonialController::class, 'update']);
            Route::delete('{id}', [TestimonialController::class, 'destroy']);
        });

        Route::prefix('widget-range-price')->name('widget.range-price')->group(function(){
            Route::get('/', [RangePriceController::class, 'index']);
            Route::post('search', [RangePriceController::class, 'search']);
            Route::get('create', [RangePriceController::class, 'create']);
            Route::post('create', [RangePriceController::class, 'store']);
            Route::get('{id}', [RangePriceController::class, 'edit']);
            Route::post('{id}', [RangePriceController::class, 'update']);
            Route::delete('{id}', [RangePriceController::class, 'destroy']);
        });

        Route::prefix('blog')->name('blog')->group(function(){
            Route::get('/', [BlogController::class, 'index']);
            Route::post('search', [BlogController::class, 'search']);
            Route::get('create', [BlogController::class, 'create']);
            Route::post('create', [BlogController::class, 'store']);
            Route::get('{id}', [BlogController::class, 'edit']);
            Route::post('{id}', [BlogController::class, 'update']);
            Route::delete('{id}', [BlogController::class, 'destroy']);
        });

        Route::prefix('tag')->name('tag')->group(function(){
            Route::get('/', [TagController::class, 'index']);
            Route::post('search', [TagController::class, 'search']);
            Route::get('create', [TagController::class, 'create']);
            Route::post('create', [TagController::class, 'store']);
            Route::get('{id}', [TagController::class, 'edit']);
            Route::post('{id}', [TagController::class, 'update']);
            Route::delete('{id}', [TagController::class, 'destroy']);
        });


        Route::post('api-get-province', [ApiCoreController::class, 'showProvince']);
        Route::post('api-get-city', [ApiCoreController::class, 'showCity']);
        Route::post('api-upload-image', [ApiCoreController::class, 'uploadImage']);

        // select 2 get product (top product)
        Route::post('api-get-product', [ApiCoreController::class, 'getProduct']);


    });
    
});
