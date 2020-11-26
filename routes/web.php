<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetail;
use App\Models\Product;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);
Route::get('/shop', [HomeController::class, 'shop']);

// login
Route::get('/login-customer', [HomeController::class, 'login']);
Route::post('/check-login', [HomeController::class, 'check_login']);
Route::get('/registration', [HomeController::class, 'registration']);
Route::post('/check-registration', [HomeController::class, 'check_registration']);
Route::get('/logout', [HomeController::class, 'logout']);
//
Route::get('/category/{category_id}', [HomeController::class, 'category']);
Route::get('/brand/{brand_id}', [HomeController::class, 'brand']);
Route::get('/product-detail/{product_id}', [ProductDetail::class, 'product_detail']);

// blog
Route::get('/blog', [PostController::class, 'blog']);
Route::get('/blog-detail/{post_slug}', [PostController::class, 'blog_detail']);

// cart
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/cart', [CartController::class, 'show_cart']);
Route::get('/delete-item/{rowId}', [CartController::class, 'delete_item']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/check-coupon', [CartController::class, 'check_coupon']);

// check-out
Route::get('/check-out', [CheckOutController::class, 'check_out']);
Route::post('/save-checkout', [CheckOutController::class, 'save_checkout']);
Route::get('/check-out-success', [CheckOutController::class, 'check_out_success']);
Route::post('/select', [CheckOutController::class, 'select']);

// comment
Route::post('/add-comment', [ProductDetail::class, 'add_comment']);
Route::post('/reply-comment', [ProductDetail::class, 'reply_comment']);

// search
Route::post('/search', [HomeController::class, 'search']);


// Back end
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/checklogin', [AdminController::class, 'check_login']);
    Route::get('/logout', [AdminController::class, 'logout']);
    // Category
    Route::group(['prefix' => 'category'], function () {
        Route::get('/add-category', [CategoryController::class, 'add_category']);
        Route::get('/all-category', [CategoryController::class, 'all_category']);
        Route::post('/save-category', [CategoryController::class, 'save_category']);
        Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit_category']);
        Route::post('/update-category', [CategoryController::class, 'update_category']);
        Route::get('/delete-category/{category_id}', [CategoryController::class, 'delete_category']);
        Route::get('/active-category/{category_id}', [CategoryController::class, 'active_category']);
        Route::get('/unactive-category/{category_id}', [CategoryController::class, 'unactive_category']);
    });
    // Brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/add-brand', [BrandController::class, 'add_brand']);
        Route::get('/all-brand', [BrandController::class, 'all_brand']);
        Route::post('/save-brand', [BrandController::class, 'save_brand']);
        Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit_brand']);
        Route::post('/update-brand', [BrandController::class, 'update_brand']);
        Route::get('/delete-brand/{brand_id}', [BrandController::class, 'delete_brand']);
        Route::get('/active-brand/{brand_id}', [BrandController::class, 'active_brand']);
        Route::get('/unactive-brand/{brand_id}', [BrandController::class, 'unactive_brand']);
    });
    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/add-product', [ProductController::class, 'add_product']);
        Route::get('/all-product', [ProductController::class, 'all_product']);
        Route::post('/save-product', [ProductController::class, 'save_product']);
        Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
        Route::post('/update-product', [ProductController::class, 'update_product']);
        Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
        Route::get('/product_status/{product_id}', [ProductController::class, 'product_status']);
        // gallery
        Route::get('/gallery/{product_id}', [GalleryController::class, 'gallery']);
        Route::post('/add-gallery', [GalleryController::class, 'add_gallery']);
        Route::get('/delete-ga/{gallery_id}', [GalleryController::class, 'delete_ga']);
        Route::get('/comment/{product_id}', [ProductController::class, 'gallery']);
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/confirm-order', [CheckOutController::class, 'confirm_order']);
        Route::get('/detail-order/{order_id}', [CheckOutController::class, 'detail_order']);
    });
    // coupon
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/add-coupon', [CouponController::class, 'add_coupon']);
        Route::get('/all-coupon', [CouponController::class, 'all_coupon']);
        Route::post('/save-coupon', [CouponController::class, 'save_coupon']);
        Route::get('/edit-coupon/{coupon}', [CouponController::class, 'edit_coupon']);
        Route::post('/update-coupon', [CouponController::class, 'update_coupon']);
        Route::get('/delete-coupon/{brand_id}', [CouponController::class, 'delete_coupon']);
    });
    //post
    Route::group(['prefix' => 'post'], function () {
        // category post
        Route::get('/add-category-post', [PostController::class, 'add_category_post']);
        Route::get('/all-category-post', [PostController::class, 'all_category_post']);
        Route::post('/save-category-post', [PostController::class, 'save_category_post']);
        Route::get('/edit-category-post/{category_post_id}', [PostController::class, 'edit_category_post']);
        Route::post('/update-category-post', [PostController::class, 'update_category_post']);
        Route::get('/delete-category-post/{category_post_id}', [PostController::class, 'delete_category_post']);
        Route::get('/status-category-post/{category_post_id}', [PostController::class, 'status_category_post']);
        // post
        Route::get('/add-post', [PostController::class, 'add_post']);
        Route::get('/all-post', [PostController::class, 'all_post']);
        Route::post('/save-post', [PostController::class, 'save_post']);
        Route::get('/edit-post/{post_id}', [PostController::class, 'edit_post']);
        Route::post('/update-post', [PostController::class, 'update_post']);
        Route::get('/delete-post/{post_id}', [PostController::class, 'delete_post']);
        Route::get('/status-post/{post_id}', [PostController::class, 'status_post']);
    });
});
Route::get('/send-mail', [MailController::class, 'send_mail']);
