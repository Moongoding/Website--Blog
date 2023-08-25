<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index()
    // {
    //     $title = '';
    //     if (request('category')) {
    //         $category = Category::firstWhere('slug', request('category'));
    //         $title = ' in ' . $category->name;
    //     };

    //     if (request('author')) {
    //         $author = User::firstWhere('username', request('author'));
    //         $title = ' by ' . $author->name;
    //     };

    //     return view('posts', [
    //         "title" => "Article" . $title,
    //         "active" => 'Blog',
    //         // "posts" => Post::all()
    //         "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
    //     ]);
    public function index()
    {
        $title = '';
        $categoryName = '';
        $authorName = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $categoryName = $category ? $category->name : 'Category has been deleted';
            $title = ' in ' . $categoryName;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $authorName = $author ? $author->name : 'Author has been deleted';
            $title = ' by ' . $authorName;
        }

        return view('posts', [
            "title" => "Article" . $title,
            "active" => 'Blog',
            "posts" => Post::latest()
                ->with(['category', 'author'])
                ->filter(request(['search', 'category', 'author']))
                ->paginate(7)
                ->withQueryString(),
            "categoryName" => $categoryName,
            "authorName" => $authorName,
        ]);
    }



    public function show(Post $post)
    {
        return view('post', [
            "title" => $post->title,
            "post" => $post,
        ]);
    }
}
