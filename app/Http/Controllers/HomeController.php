<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_count = User::count();
        $posts_count = Post::count();
        $tags_count = Tag::count();
        $categories_count = Category::count();
        return view('home', compact('users_count', 'posts_count', 'tags_count', 'categories_count'));
    }
}
