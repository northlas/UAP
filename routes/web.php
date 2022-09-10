<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
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

Route::middleware('guest')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/login', 'getLogin')->name('login');
        Route::post('/login', 'postLogin');
    
        Route::get('/register', 'getRegister');
        Route::post('/register', 'postRegister');
    });
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/games/{game:slug}/add-review', [ReviewController::class, 'add']);

    Route::controller(CartController::class)->group(function(){
        Route::get('/cart', 'index');
        Route::get('/cart/add/{game:slug}', 'add');
        Route::get('/cart/remove/{cart:game_id}', 'remove');
        Route::get('/cart/checkout', 'checkout');
    });
    
    Route::middleware('can:isAdmin')->group(function(){
        Route::controller(GameController::class)->group(function(){
            Route::get('/manage-games', 'manage')->name('manage-games');
            
            Route::get('/add-game', 'add');
            Route::post('/add-game', 'store');
        
            Route::get('/update-game/{game:slug}', 'update');
            Route::post('/update-game/{game:slug}', 'change');

            Route::get('/delete-game/{game:slug}', 'delete');
        }); 

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/manage-categories', 'manage')->name('manage-categories');

            Route::get('/add-category', 'add');
            Route::post('/add-category', 'store');

            Route::get('/update-category/{category:slug}', 'update');
            Route::post('/update-category/{category:slug}', 'change');

            Route::get('/delete-category/{category:slug}', 'delete');
        }); 
    });
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/search', [GameController::class, 'search']);
Route::get('/games/{game:slug}', [GameController::class, 'index']);
