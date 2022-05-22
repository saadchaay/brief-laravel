<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnlikeController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/', [PostController::class, 'index'])->name('home.index');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/all', [PostController::class, 'all'])->name('posts.all');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::post('/', [PostController::class, 'filter'])->name('filter');

Route::get('/comments', [CommentController::class, 'index'])->name('comments');
Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::post('/likes/{post}', [LikeController::class, 'store'])->name('likes.store');
Route::post('/unlike/{post}', [UnlikeController::class, 'store'])->name('unlike.store');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::patch('/profile/{user}', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/admin/posts/{user}', [AdminPostController::class, 'index'])->name('admin.posts');
// Route::get('/admin/posts/{post}', [AdminPostController::class, 'show'])->name('admin.posts.show');
Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.post');
Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.post.update');
Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.post.destroy');

// Route::get('/admin/comments/{post}', [AdminPostController::class, 'index'])->name('admin.posts');
Route::get('/admin/comments/{post}', [AdminCommentController::class, 'index'])->name('admin.comments');
Route::post('/admin/comments/{post}', [AdminCommentController::class, 'store'])->name('admin.comment');
Route::delete('/admin/comments/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy');

Route::get('/admin', [AdminUserController::class, 'index'])->name('admin.users');
Route::delete('/admin/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

Route::get('/admin/posts', [AdminPostController::class, 'show'])->name('admin.posts.show');
Route::get('/admin/comments', [AdminCommentController::class, 'show'])->name('admin.comments.show');

