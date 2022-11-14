<?php

use App\Http\Controllers\AdminController\AttributeController;
use App\Http\Controllers\AdminController\AttributeValueController;
use App\Http\Controllers\AdminController\BannerController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\CouponController;
use App\Http\Controllers\AdminController\DiscountController;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\ProductController;
use App\Http\Controllers\AdminController\RoleController;
use App\Http\Controllers\AdminController\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController\LoginController as CustomerControllerLoginController;
use App\Http\Controllers\CustomerController\MemberController;
use App\Http\Controllers\CustomerController\ReviewController;
use App\Http\Controllers\CustomerController\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController\MomoPayController;
use App\Http\Controllers\PaymentController\VnPayController;
use App\Http\Controllers\PaymentController\ZaloPayController;
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

/**
 * Route customer
 */

Route::prefix('/')->group(function () {
    Route::group(['controller' => ShopController::class, 'as' => 'shop.'], function () {
        Route::get('/', 'home')->name('home');
        Route::get('/shop', 'shop')->name('shop');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/detail/{productModel}', 'detail')->name('detail');
        Route::get('/thank-you', 'thankyou')->name('thankyou');
    });

    Route::middleware('checkMemberLogin')->group(function () {
        Route::group(['controller' => MemberController::class, 'prefix' => 'member', 'as' => 'member.'], function () {
            Route::get('/profile', 'index')->name('profile');
            Route::post('/profile/update/{memberModel}', 'update')->name('update');
        });
    });

    Route::group(['controller' => CustomerControllerLoginController::class, 'prefix' => '/login', 'as' => 'member.'], function () {
        Route::get('/', 'index')->name('login.index');
        Route::post('register', 'register')->name('register');
        Route::get('redirect/{provider}', 'redirect')->name('redirect');
        Route::get('callback/{provider}', 'callback')->name('callback');
        Route::get('active/{token}/{p?}', 'active')->name('active');
        Route::post('login/login', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::group(['controller' => ReviewController::class, 'prefix' => 'review', 'as' => 'review.'], function () {
        Route::post('/store', 'store')->name('store');
    });

    Route::group(['controller' => CartController::class, 'prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::post('/apply-coupon', 'applyCoupon')->name('coupon');
        Route::post('/add', 'addCart')->name('add');
        Route::post('/update', 'updateCart')->name('update');
        Route::get('/delete/{idItemCart}', 'deleteItemCart')->name('delete');
    });

    Route::group(['controller' =>  OrderController::class, 'prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/checkPayment', 'checkPayment')->name('checkPayment');
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::group(['controller' => VnPayController::class, 'prefix' => 'vnpay', 'as' => 'vnpay.'], function () {
            Route::get('/hookCallBack', 'hookCallBack')->name('hookCallBack');
        });

        Route::group(['controller' => MomoPayController::class, 'prefix' => 'momo', 'as' => 'momo.'], function () {
            Route::get('/hookCallBack', 'hookCallBack')->name('hookCallBack');
        });

        Route::group(['controller' => ZaloPayController::class, 'prefix' => 'zalo', 'as' => 'zalo.'], function () {
            Route::get('/hookCallBack', 'hookCallBack')->name('hookCallBack');
        });
    });

    Route::get('/thankyou', function () {
        return view('customer.thankyou');
    })->name('thankyou');
});

/**
 * Route admin
 */

Route::prefix('admin')->group(function () {
    Route::group(['controller' => LoginController::class, 'prefix' => 'login', 'as' => 'login.'], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/login', 'login')->name('login');
        Route::get('/login/logout', 'logout')->name('logout');
    });
    Route::middleware('checkAdminLogin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard.index');

        Route::group(['controller' => BannerController::class, 'prefix' => 'banner', 'as' => 'banner.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{bannerModel}', 'edit')->name('edit');
            Route::put('/update/{bannerModel}', 'update')->name('update');
            Route::delete('/destroy/{bannerModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => CategoryController::class, 'prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{categoryModel}', 'edit')->name('edit');
            Route::put('/update/{categoryModel}', 'update')->name('update');
            Route::delete('/destroy/{categoryModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => CouponController::class, 'prefix' => 'coupon', 'as' => 'coupon.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{couponModel}', 'edit')->name('edit');
            Route::put('/update/{couponModel}', 'update')->name('update');
            Route::delete('/destroy/{couponModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => AttributeController::class, 'prefix' => 'attribute', 'as' => 'attribute.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{attributeModel}', 'edit')->name('edit');
            Route::put('/update/{attributeModel}', 'update')->name('update');
            Route::delete('/destroy/{attributeModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => AttributeValueController::class, 'prefix' => 'attribute-value', 'as' => 'attributeValue.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{attributeValueModel}', 'edit')->name('edit');
            Route::put('/update/{attributeValueModel}', 'update')->name('update');
            Route::delete('/destroy/{attributeValueModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => DiscountController::class, 'prefix' => 'discount', 'as' => 'discount.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{discountModel}', 'edit')->name('edit');
            Route::put('/update/{discountModel}', 'update')->name('update');
            Route::delete('/destroy/{discountModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => ProductController::class, 'prefix' => 'product', 'as' => 'product.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{productModel}', 'show')->name('show');
            Route::get('/edit/{productModel}', 'edit')->name('edit');
            Route::put('/update/{productModel}', 'update')->name('update');
            Route::delete('/destroy/{productModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => RoleController::class, 'prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{roleModel}', 'edit')->name('edit');
            Route::put('/update/{roleModel}', 'update')->name('update');
            Route::delete('/destroy/{roleModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => UserController::class, 'prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{userModel}', 'show')->name('show');
            Route::get('/edit/{userModel}', 'edit')->name('edit');
            Route::put('/update/{userModel}', 'update')->name('update');
            Route::delete('/destroy/{userModel}', 'destroy')->name('delete');
        });

        Route::group(['controller' => ReviewController::class, 'prefix' => 'review', 'as' => 'review.'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{reviewModel}', 'show')->name('show');
            Route::get('/edit/{reviewModel}', 'edit')->name('edit');
            Route::put('/update/{reviewModel}', 'update')->name('update');
            Route::delete('/destroy/{reviewModel}', 'destroy')->name('delete');
        });
    });
});
