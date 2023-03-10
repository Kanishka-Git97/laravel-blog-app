<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Session\Middleware\AuthenticateSession;
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
Route::get('/', [PagesController::class, 'getIndex'])->name('index');

// Authentication Routes
Route::get('auth/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('auth/logout',[AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('auth/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('auth/register', [AuthController::class, 'postRegister'])->name('register.post');

// Post Resource Management
Route::resource('posts', PostController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Comments Routes
Route::post('/comments/{post_id}', [CommentsController::class, 'store'])->name('comment.store');
