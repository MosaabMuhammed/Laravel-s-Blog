<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
	public function index()
	{
		return view('welcome')->with('categories', Category::take(5)->get())
							  ->with('first_post', Post::latest()->first())
							  ->with('second_post', Post::latest()->skip(1)->take(1)->get()->first())
							  ->with('third_post', Post::latest()->skip(2)->take(1)->get()->first())
							  ->with('career', Category::find(6))
							  ->with('tutorial', Category::find(5));
	}

	public function show(Post $post)
	{
		$next_id = Post::where('id', '>', $post->id)->min('id');
		$prev_id= Post::where('id', '<', $post->id)->max('id');

		return view('single')->with('post', $post)
							 ->with('categories', Category::take(5)->get())
							 ->with('tags', Tag::take(5)->get())
							 ->with('next', Post::find($next_id))
							 ->with('prev', Post::find($prev_id));
	}

	public function showCategory(Category $category)
	{
		return view('category')->with('category', $category)
							 ->with('categories', Category::take(5)->get())
							 ->with('posts', Post::where('category_id', $category->id)->get())
							 ->with('tags', Tag::take(5)->get());
	}
}
