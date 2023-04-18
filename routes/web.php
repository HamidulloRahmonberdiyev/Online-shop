<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminMainController;
use App\Http\Controllers\AdminModificationController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StoredController;
use Illuminate\Support\Facades\Auth;
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

// LANGUAGE ROUTE
Route::get('language/{locale}', [LanguageController::class, 'change_locale'])->name('locale.change');



// FRONTEND ROUTES


# Page Main
Route::get('/', [MainController::class, 'main'])->name('main');

# Page Search
Route::get('search', [SearchController::class, 'search'])->name('search');

# Page Modification
Route::get('modification', [ModificationController::class, 'modification'])->name('modification');

# Page Product
Route::get('products', [ProductController::class, 'products'])->name('front.products');
Route::get('products/{product}/product', [ProductController::class, 'product_show'])->name('front.products.show');

# Page Order
Route::get('orders', [OrderController::class, 'orders'])->name('front.orders');
Route::post('orders/{order}/order', [OrderController::class, 'orders_store'])->name('front.orders.store');
Route::get('orders/confirmation', [OrderController::class, 'orders_confirmation'])->name('front.order.confirmation');
Route::post('orders/{order}/destroy', [OrderController::class, 'destroy'])->name('front.orders.destroy');
Route::get('orders/destroy/all', [OrderController::class, 'destroyAll'])->name('front.orders.destroy.all');

# Page Stored
Route::get('storeds', [StoredController::class, 'storeds'])->name('front.storeds');
Route::post('storeds/{stored}/stored', [StoredController::class, 'add_store'])->name('front.storeds.store');
Route::post('storeds/{stored}/destroy', [StoredController::class, 'destroy'])->name('front.storeds.destroy');

# Page Contact
Route::get('contact', [ContactController::class, 'contact'])->name('contact');

# Page Auth
Route::get('front/login', [AuthController::class, 'login'])->name('front.login');
Route::post('front/authenticate', [AuthController::class, 'authenticate'])->name('front.authenticate');
Route::get('front/register', [AuthController::class, 'register'])->name('front.register');
Route::post('front/register', [AuthController::class, 'register_store'])->name('front.register.store');
Route::get('front/logout', [AuthController::class, 'logout'])->name('front.logout');

# Page Category
Route::get('categories/{category}/category', [CategoryController::class, 'category'])->name('front.categories.category');





// BACKEND ROUTES

Auth::routes();
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    # Admin Main Page
    Route::get('/', [AdminMainController::class, 'index'])->name('admin');

    # Admin Search Page
    Route::get('search/users', [AdminSearchController::class, 'search_user'])->name('search.users');
    Route::get('search/products', [AdminSearchController::class, 'search_product'])->name('search.products');

    # Admin Order Page
    Route::resource('orders', AdminOrderController::class);

    # Admin Category Page
    Route::resource('categories', AdminCategoryController::class);

    # Admin Product Page
    Route::resource('products', AdminProductController::class);

    # Admin Modification Page
    Route::resource('modifications', AdminModificationController::class);

    # Admin Role Page
    Route::resource('roles', AdminRoleController::class);

    # Admin User Page
    Route::resource('users', AdminUserController::class);



});
