<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [PostController::class, 'index']);

Route::get('/about', function () {
    return view('About', [
        "title" => "About",
        "name" => "Krisma",
        "email" => "krisma@gmail.com",
        "image" => "img/Formal.jpeg"
    ]);
});

// Halaman All Post
Route::get('/posts', [PostController::class, 'index']);
// Halaman Single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        "active" => 'Blog',
        "posts" => Post::latest()
            ->with(['category', 'author'])
            ->filter(request(['search', 'category', 'author']))
            ->paginate(7)
            ->withQueryString(),
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
// Route::delete('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/dashboard/allpost', function () {
    return view('dashboard.allpost.index', [
        $allPosts = Post::all(), // Mengambil semua post
        'allPosts' => $allPosts,
    ]);
})->middleware('admin');






// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//
//         'posts' => $category->posts->load('author', 'category'),
//     ]);
// });
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'Posts',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });


// Dokumentasi
Route::get('/dokumentasi', function () {
    return view('welcome');
});
