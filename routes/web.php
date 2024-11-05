<?php
require __DIR__.'/auth.php';
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('dashboard/blogs/create', [BlogController::class, 'create'])->name('blogs.create'); 
    Route::post('dashboard/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('dashboard/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('dashboard/blogs/{blog}/update', [BlogController::class, 'update'])->name('blogs.update');
});

Route::delete('/blogs/{blog}', action: [BlogController::class, 'destroy'])->name('blogs.destroy');
Route::get('/',[userController::class,'users'])->name('welcome');
Route::get('/',[userController::class,'users'])->name('blogs.show');
Route::get('/blogs/{id}',[userController::class,'users_show'])->name('welcome');
Route::get('/blogs/{id}',[userController::class,'users_show'])->name('blogs.show');


Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('comments',[CommentController::class,'index'])->name('comments.index');
Route::delete('comments/{comments}', action: [CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::patch('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

Route::patch('/comments/{comment}/response', [CommentController::class, 'respondToComment'])->name('comments.updateResponse');

Route::get('/fitness',action: [BlogController::class,'fitness'])->name('fitness');
Route::get('/daily',action: [BlogController::class,'daily'])->name('daily');
Route::get('/weight',action: [BlogController::class,'weight'])->name('weight');

// routes/web.php
Route::get('/dashboard', [DashboardController::class, 'categories'])->name('dashboard');

Route::get('/search', [userController::class, 'search'])->name('blogs.search');
