<?php

use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


// 127.0.0.1:8000/     => index.php

Route::get('/home', function() {
    return view('pages.home');  // resources/views/home.blade.php
});
Route::get('/', function () {

    $categories = Category::with('posts')->get();
    return view('categories', [
        'categories' => $categories,
    ]);
});
// cadt.edu.kh/posts

Route::get('posts', function() {

    return view('pages.post', [
        'title' => 'Post',
        'posts' => Post::with('category')->get(),
    ]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
