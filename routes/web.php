<?php

namespace App\Http\Controllers;

use App\Helper\CartHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ControllerLogin;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PostsController;


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\CartManagerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\QuanLySanPhamController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;

// tet
// use App\Http\Controllers\User\PostsController;
use App\Http\Controllers\Admin\repostsController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\PassController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\DetailProductController;
use App\Http\Controllers\User\ControllerRegi;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ResetPassController;
use App\Http\Controllers\Admin\SendmailController;
use App\Http\Controllers\User\OdersController;
use App\Http\Controllers\User\ReportController;

// use App\Http\Controllers\Admin\MenuController;

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
});
// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');

    // QUAN LY WEBSITE
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/banner', [UserController::class, 'menu'])->name('banner');

    //QUAN LY SAN PHAM 
    Route::resource('account', AccountController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

    Route::get('thongso/{id?}', [ProductController::class, 'thongso'])->name('thongso');
    Route::post('thongso/{id?}', [ProductController::class, 'post_thongso']);

    Route::get('thietlap', [QuanLySanPhamController::class, 'index'])->name('thietlap');
    Route::get('file', [FileController::class, 'index'])->name('file');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // CART
    Route::resource('cart', CartManagerController::class);
    Route::get('/cart_view', [CartManagerController::class, 'view'])->name('cart_view');
    Route::get('/cart_success-{id?}', [CartManagerController::class, 'cart_success'])->name('cart_success');
    Route::get('/cart_cancel-{id?}', [CartManagerController::class, 'cart_cancel'])->name('cart_cancel');
    Route::get('/cart_detail-{id?}', [CartManagerController::class, 'cart_detail'])->name('cart_detail');

    // ADD ACCOUNT
    Route::get('/add_account', [LoginController::class, 'addaccount'])->name('addaccount');

    // POST BÀI VIẾT
    Route::resource('post', PostController::class);
    Route::resource('users', UsersController::class);

    // QL LỊCH TRÌNH
    Route::resource('calendar', CalendarController::class);
    Route::get('/tasks', [CalendarController::class, 'task'])->name('task');
    
    // QL GIAO DIEN
    Route::resource('banner', BannerController::class);
    

    // Setting
    Route::resource('/profile', SettingsController::class);
    Route::resource('/resetmk', ResetPassController::class);

    // QUAN LY THU
    Route::resource('/qlthu', SendmailController::class);
    Route::resource('/qlbaohong',repostsController::class);
    // quản lý comment
    // Route::resource('/qlcomment', CommentController::class);
    Route::get('/comment/reply', [CommentController::class, 'replyComment'])->name('admin.comment.reply');
    Route::get('/comment/change-browse', [CommentController::class, 'changeBrowse'])->name('admin.change.browse');
    Route::get('/comment', [CommentController::class, 'indexShowComment'])->name('admin.comment.index');
    Route::get('/comment/delete/{id}', [CommentController::class, 'deleteComment'])->name('admin.comment.delete');
});

// THONG KE
Route::post('/days-order', [HomeController::class, 'days_order'])->name('days-order');
Route::post('/filter-by-date', [HomeController::class, 'filter_by_date'])->name('filter-by-date');
Route::post('/dashboard-filter', [HomeController::class, 'dashboard_filter'])->name('dashboard-filter');

// LOGIN ADMIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
// ĐĂNG KÝ
Route::get('/register', [ControllerRegi::class, 'index']);
Route::post('/register', [ControllerRegi::class, 'store']);
// gg
Route::get('/login-google', [ControllerLogin::class, 'login_google']);
Route::get('/car_td/google/callback', [ControllerLogin::class, 'callback_google']);
// facebook
Route::get('/login-facebook', [ControllerLogin::class, 'login_facebook']);
Route::get('/car_td/google/callback', [ControllerLogin::class, 'callback_facebook']);
// USER
Route::group(['prefix' => 'car_td'], function () {

    Route::get('/', [UserController::class, 'index'])->name('home');

    // LOGIN USER
    Route::get('/login_user', [ControllerLogin::class, 'login'])->name('login_user');
    Route::post('/login_user', [ControllerLogin::class, 'postlogin']);
    Route::get('/signup_user', [ControllerLogin::class, 'signup_user'])->name('signup_user');
    Route::post('/signup_user', [ControllerLogin::class, 'post_signup_user']);
    Route::get('/logout_user', [ControllerLogin::class, 'logout'])->name('logout_user');
    // Route::get('/login-google', [ControllerLogin::class, 'login_google']);
    // Route::get('/car_td/google/callback',[ControllerLogin::class, 'callback_google']);

    // đổi mật khẩu
    Route::resource('/reset', PassController::class);
    // Profile
    Route::resource('/setting', SettingController::class);
    // Route::get('/signup_user', [ControllerLogin::class,'signup_user'])->name('signup_user');
    // Route::post('/signup_user', [ControllerLogin::class,'post_signup_user']);
    // Route::get('/logout_user', [ControllerLogin::class,'logout'])->name('logout_user');

    Route::get('/about', [UserController::class, 'about'])->name('about');

    // BLOG TIN TỨC
    Route::resource('posts', PostsController::class);
    Route::get('/blog', [PostsController::class, 'blog'])->name('blog');
    Route::get('/tin-tuc/{slug}/{id?}', [PostsController::class, 'blog_single'])->name('tin-tuc');

    // CART
    Route::get('/cart_add/{id}', [CartController::class, 'add'])->name('cart_add');
    Route::get('/cart_remove/{id?}', [CartController::class, 'remove'])->name('cart_remove');
    Route::get('/cart_update/{id?}', [CartController::class, 'update'])->name('cart_update');
    Route::get('/cart_clear', [CartController::class, 'clear'])->name('cart_clear');
    Route::get('/Mycart', [CartController::class, 'Mycart'])->name('Mycart');

    Route::group(['prefix' => 'checkout'], function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
        // Route::get('/form_checkout', [CheckoutController::class, 'form'])->name('form_checkout');  
        Route::post('/form_checkout', [CheckoutController::class, 'submit_form'])->name('form_checkout');
    });

    // SO SÁNH
    Route::get('/compare/{id?}', [UserController::class, 'compare'])->name('compare');

    // DỊCH VỤ
    Route::get('/service', [UserController::class, 'service'])->name('service');

    // CONTACT
    Route::resource('/contact', ContactController::class);

    // TEST MAIL
    Route::get('/mail_quangcao', [UserController::class, 'mail_quangcao'])->name('mail_quangcao');
    // Route::post('/mail_quangcao', [UserController::class, 'mail_quangcao'])->name('mail_quangcao');

    Route::get('/error', [UserController::class, 'error'])->name('error');

    // SAN PHAM 
    Route::get('/{id}/{slug}', [UserController::class, 'purchase'])->name('purchase');

    // SAN PHẨM CHI TIẾT
    Route::get('/sp/{slug}/{id?}', [UserController::class, 'purchase_new_single'])->name('sp');
    Route::get('/purchase_old', [UserController::class, 'purchase_old'])->name('purchase_old');
    Route::get('/purchase_used', [UserController::class, 'purchase_used'])->name('purchase_used');
    // Bán xe cũ
    Route::get('/sell_step', [UserController::class, 'sell_step'])->name('sell_step');

    Route::get('/comments', [DetailProductController::class, 'showAllComment'])->name('comments.showall');
    Route::post('/send-comments', [DetailProductController::class, 'sendComment'])->name('comments.send');
     // đơn hàng của Tôi
     Route::resource('/oders',OdersController::class);
     // báo hỏng
     Route::resource('/report',ReportController::class, );
});
