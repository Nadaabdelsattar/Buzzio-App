<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ThoughtsController as AdminThoughtsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ThoughtLikeController;
use App\Http\Controllers\ThoughtsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureUserisAdmin;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class , 'index'])->name('Dashboard')->middleware('auth');


Route::group(['prefix' => 'Thoughts/', 'as' => 'Thoughts.', 'middleware' => 'auth'], function(){


    Route::post('/', [ThoughtsController::class , 'store'])->name('store')->withoutMiddleware('auth');


    Route::delete('/{Thought}', [ThoughtsController::class , 'destroy'])->name('destroy');


    Route::get('/{Thought}', [ThoughtsController::class , 'show'])->name('show')->withoutMiddleware('auth');


    Route::get('/{Thought}/edit', [ThoughtsController::class , 'edit'])->name('edit');


    Route::put('/{Thought}', [ThoughtsController::class , 'update'])->name('update');


    Route::post('/{Thought}/comments', [CommentController::class , 'store'])->name('comments.store');

});



Route::group(['middleware'=>'guest'],function() {

    Route::get('/register', [AuthController::class , 'register'])->name('Regiser');


    Route::post('/register', [AuthController::class , 'store']);


    Route::get('/login', [AuthController::class , 'login'])->name('login');


    Route::post('/login', [AuthController::class , 'authenticate']);

});

Route::post('/logout', [AuthController::class , 'logout'])->middleware('auth')->name('logout');




Route::resource('/users', UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');



Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


Route::post('/Thoughts/{Thought}/like', [ThoughtLikeController::class, 'like'])->middleware('auth')->name('Thoughts.like');
Route::post('/Thoughts/{Thought}/unlike', [ThoughtLikeController::class, 'unlike'])->middleware('auth')->name('Thoughts.unlike');


Route::get('/feed',[FeedController::class, '__invoke'])->middleware('auth')->name('feed');



Route::get('/terms', function(){
    return view('terms');
})->name('terms');



Route::middleware('auth')->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class , 'index'])->name('Dashboard');
    Route::get('/users', [UsersController::class , 'index'])->name('users');
    Route::get('/Thoughts', [AdminThoughtsController::class , 'index'])->name('Thoughts');




});












