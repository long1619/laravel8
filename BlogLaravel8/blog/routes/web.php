<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\categoryposts\CategoryPostsController;
use App\Http\Controllers\categoryposts\CategoryHomeController;
use App\Http\Controllers\posts\PostsController;
use App\Http\Controllers\posts\PostHomeController;
use App\Http\Controllers\home\HomeController;
// use App\Http\Controllers\TaskController;
// use App\Http\Controllers\UserController;



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

Route::middleware(['auth:sanctum', 'verified'])->get('/home-admin', function () {
    return view('admin.Admin');
})->name('admin.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

//---------------------------------//

Route::get('/home-admin', [AdminController::class, 'create'])->name('admin.create');

//--trang thêm danh mục
Route::get('/category', [CategoryPostsController::class, 'create'])->name('category.create');
//lưu các trường khi thêm
Route::post('/category-store', [CategoryPostsController::class, 'store'])->name('category.store');
//hiển thị các danh mục
Route::get('/category-show', [CategoryPostsController::class, 'index'])->name('category.index');
//trang sửa
Route::get('/category-edit/{id}', [CategoryPostsController::class, 'show'])->name('category.show');
//cập nhật khi sửa xong
Route::post('/category-update/{id}', [CategoryPostsController::class, 'update'])->name('category.update');
//xóa
Route::get('/category-destroy/{id}', [CategoryPostsController::class, 'destroy'])->name('category.destroy');

//------------------
//thêm bài viết
Route::get('/posts', [PostsController::class, 'create'])->name('posts.create');
//lưu các trường khi thêm
Route::post('/posts-store', [PostsController::class, 'store'])->name('posts.store');
//hiển thị các danh mục
Route::get('/posts-show', [PostsController::class, 'index'])->name('posts.index');
// trang sửa
Route::get('/posts-edit/{id}', [PostsController::class, 'show'])->name('posts.show');
//cập nhật khi sửa xong
Route::post('/posts-update/{id}', [PostsController::class, 'update'])->name('posts.update');
// xóa
Route::get('/posts-destroy/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
//-----------------------------------------------------
//home
Route::get('/home-page', [HomeController::class, 'index'])->name('home.index');
// show danh mục có các bài viết thuộc danh mục nào đó
Route::get('/category-home-show/{id}', [CategoryHomeController::class, 'show'])->name('cate_home.show');
// chi tiết 1 bài viết
Route::get('/post_home-show/{id}', [PostHomeController::class, 'show'])->name('post_home.show');
Route::get('/search', [HomeController::class, 'search_keywword'])->name('search.search_keywword');
