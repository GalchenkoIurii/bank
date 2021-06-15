<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Admin\BlankController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CreditController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])
    ->name('home');
Route::get('/about', [MainController::class, 'about'])
    ->name('about');
Route::get('/agreement', [MainController::class, 'agreement'])
    ->name('agreement');
Route::get('/business', [MainController::class, 'business'])
    ->name('business');
Route::get('/confidentiality', [MainController::class, 'confidentiality'])
    ->name('confidentiality');

// need to group all routes with auth middleware
Route::get('/finances', [MainController::class, 'finances'])
    ->name('finances')->middleware('auth');

//
Route::post('/finances', [OperationController::class, 'storeTransaction'])
    ->name('transaction.store')->middleware('auth');


/*
 * credit pages
 */
Route::get('/lending', [MainController::class, 'lending'])
    ->name('lending')->middleware('auth');
Route::post('/lending', [MainController::class, 'creditStore'])
    ->name('lending.store')->middleware('auth');

Route::get('/lending/info', [MainController::class, 'creditInfo'])
    ->name('lending.info')->middleware('auth');

Route::get('/lending/{category}', [MainController::class, 'credit'])
    ->name('lending.category')->middleware('auth');

Route::get('/credit-agreement/{id}', [MainController::class, 'creditAgreement'])
    ->name('credit.agreement')->middleware('auth');

//
Route::get('/check/{id}', [MainController::class, 'check'])
    ->name('check')->middleware('auth');


Route::get('/services', [MainController::class, 'services'])
    ->name('services')->middleware('auth');


Route::get('/convert', [MainController::class, 'convert'])
    ->name('convert')->middleware('auth');

Route::post('/convert', [ConvertController::class, 'store'])
    ->name('convert.store')->middleware('auth');

Route::post('/convert/handle', [ConvertController::class, 'handle'])
    ->name('convert.handle')->middleware('auth');


Route::get('/investments', [MainController::class, 'investments'])
    ->name('investments')->middleware('auth');

//
Route::get('/profile', [MainController::class, 'profile'])
    ->name('profile')->middleware('auth');

//
Route::get('/notices', [MainController::class, 'notices'])
    ->name('notices')->middleware('auth');

/*
 * register, login, logout
 */
Route::get('/register', [UserController::class, 'create'])
    ->name('register.create')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])
    ->name('register.store')->middleware('guest');
Route::get('/login', [UserController::class, 'loginForm'])
    ->name('login.create')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])
    ->name('login')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])
    ->name('logout')->middleware('auth');


/*
 * reset password
 */
Route::get('/forgot-password', [UserController::class, 'passwordRequest'])
    ->name('password.request')->middleware('guest');
Route::post('/forgot-password', [UserController::class, 'passwordEmail'])
    ->name('password.email')->middleware('guest');

Route::get('/reset-password/{token}/', [UserController::class, 'passwordReset'])
    ->name('password.reset')->middleware('guest');
Route::post('/reset-password', [UserController::class, 'passwordUpdate'])
    ->name('password.update')->middleware('guest');


Route::get('/user/settings', [UserController::class, 'userSettings'])
    ->name('user.settings')->middleware('auth');
Route::post('/user/settings', [UserController::class, 'userSettingsStore'])
    ->name('user.settings.store')->middleware('auth');

// move identify functionality to the profile
Route::get('/user/identify', [UserController::class, 'userIdentify'])
    ->name('user.identify')->middleware('auth');
Route::post('/user/identify', [UserController::class, 'userIdentifyStore'])
    ->name('user.identify.store')->middleware('auth');


/*
 * admin routes
 */
Route::prefix('admin')->middleware('admin')->group(function() {
    // need to add name('admin.') method for the group
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    // need to remake all resources in one method call
    Route::resource('/settings', SettingController::class);
    Route::resource('/cards', CardController::class);
    Route::resource('/credits', CreditController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/pages', PageController::class);
    Route::resource('/notices', NoticeController::class);
    Route::resource('/balances', BalanceController::class);
    Route::resource('/blanks', BlankController::class);

    // move balances, notices, customers to one route customers

    // need to add identification requests route

    Route::get('/get-blank/{id}', [BlankController::class, 'getBlank'])
        ->name('admin.get.blank');
    Route::get('/balances/add/{id}', [BalanceController::class, 'add'])
        ->name('admin.balance.add');
    Route::put('/balances/add/{id}', [BalanceController::class, 'addUpdate'])
        ->name('admin.balance.add.update');
    Route::get('/balances/sub/{id}', [BalanceController::class, 'sub'])
        ->name('admin.balance.sub');
    Route::put('/balances/sub/{id}', [BalanceController::class, 'subUpdate'])
        ->name('admin.balance.sub.update');
});