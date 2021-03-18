<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'home'])->name('home');


Route::prefix('home')->group(function (){

    Route::get('signup', [AuthController::class, 'getSignUp'])->name('auth.signup');
    Route::post('post', [AuthController::class, 'postSignUp'])->name('auth.postsignup');
    Route::get('login', [AuthController::class, 'getLogin'])->name('auth.login');
    Route::post('postlogin', [AuthController::class, 'postLogin'])->name('auth.postlogin');
    Route::get('signout', [AuthController::class, 'logOut'])->name('auth.logout');
    Route::get('result', [SearchController::class, 'getResult'])->name('search.result');
    Route::get('profile/{username}', [ProfileController::class, 'getProfile'])->name('profile.index');
    Route::get('edit/profile', [ProfileController::class, 'getEdit'])->name('profile.edit');
    Route::post('postedit/profile', [ProfileController::class, 'postEdit'])->name('profile.postedit');
    Route::get('friends',[FriendsController::class, 'getIndex'])->name('friends.index');
});


