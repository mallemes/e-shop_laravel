<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Company\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\auth2\RegisterController;
use App\Http\Controllers\auth2\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Company\ManagerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MessageController;
use App\Models\User;
//Route::get('/', function () {
//    return view('welcome');
//sdjddjdo
//});
Route::get('lang/{lang}', [LangController::class,'switchLang'])->name('switch.lang');
Route::get('/itemes',[ItemController::class,'index'])->name('items.indexes');
Route::get('/',[HomeController::class,'indexxx'])->name('home.index');
Route::get('items/search',[ItemController::class,'index'])->name('items.search');
Route::middleware('auth')->group(function (){
    Route::put('/profile/{user}/money',[LoginController::class, 'editMoney'])->name('users.addmoney');
    Route::post('/logout',[LoginController::class, 'logout'])->name('logout');
    Route::get('/items/buy',[ItemController::class, 'cart'])->name('items.cart');
    Route::post('/items/delete/s/{item}',[ItemController::class,'destroyCart'])->name('cart.destroy');
    Route::post('/items/buy/{item}',[ItemController::class, 'buyItem'])->name('items.buy');
    Route::post('/items/buys/all',[CartController::class, 'buyAll'])->name('cart.buyall');
    Route::resource('comments', CommentController::class );
    Route::get('/profile',[LoginController::class, 'profile'])->name('user.profile');
    Route::get('/profile/{user}',[LoginController::class,'edit'])->name('profile.edit');
    Route::put('/profile/{user}',[LoginController::class,'update'])->name('profile.update');
    Route::get('/users/messages/page',[MessageController::class,'index'])->name('user.message.index');
    Route::post('/users/messages',[MessageController::class,'messageToAdmin'])->name('user.message');
    Route::delete('/user/delete/message/{message}',[MessageController::class,'delUserMess'])->name('user.delete.message');
    Route::prefix('company')->as('company.')->middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/users/search',[UserController::class,'index'])->name('users.search');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::get('/users/buy/items',[ManagerController::class,'orderedItems'])->name('ordered.items');
        Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');
        Route::get('/list/personals',[UserController::class, 'personals'])->name('list.personals');
        Route::get('/manager/category',[ManagerController::class,'addCategoryPage'])->name('manager.addcatpage');
        Route::post('/manager/category',[ManagerController::class,'addCategory'])->name('manager.addcat');
        Route::put('/manager/confirm/order/{cart}',[ManagerController::class, 'confirmOrder'])->name('confirm.order');
        Route::delete('/message/delete/{message}',[MessageController::class,'delAdminMess'])->name('delete.message');
        Route::post('/message/user/{user}',[MessageController::class,'messToUser'])->name('message.touser');


    });
    Route::resource('items', ItemController::class )->except('index','show');

});
Route::resource('items', ItemController::class )->only('index','show');
//Route::get('/items/buy',[ItemController::class, 'cart'])->name('items.cart');
//Auth::routes();
Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class,'register'])->name('register');
Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::get('/items/category/{category}', [ItemController::class, 'postsByCategory'])->name('items.category');
