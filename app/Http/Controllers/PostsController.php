<?php

namespace App\Http\Controllers;
 use App\Post; use App\Category;
use App\Tag;
use Illuminate\Http\Request; use App\Http\Requests\PostValidation; use Illuminate\Support\Facades\Session;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if(count($categories) == 0 || count($tags) == 0) {
            Session::flash('info', "You must have at least one category created!");
            return back();
        }
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidation $request)
    {
        $image = $request->image_post;
        $image_new = time() . '_'. $image->getClientOriginalName();
        $image->move('uploads/posts', $image_new);
        
        $post = Post::forceCreate([
            'category_id'   =>  $request['category_id'],
            'title' =>  $request['title'],
            'body'  =>  $request['body'],
            'image_post'    =>  'uploads/posts/' . $image_new,
            'slug'  =>  str_slug($request->title), 
            'user_id'   =>  auth()->id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Created successfully!');

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'))
                                        ->with('categories', Category::all())
                                        ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' =>  'required', 
            'body'  =>  'required', 
            'category_id'   =>  'required',
            'tags'  =>  'required'
        ]);

        if($request->image_post) {
            $image = $request->image_post;
            $image_new = time() . '_'. $image->getClientOriginalName();
            $image->move('uploads/posts', $image_new);
            $post->image_post = 'uploads/posts/' . $image_new;
        }

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->tags()->sync($request->tags);

        $post->save();

        Session::flash('success', 'Post Updated successfully!');

        return redirect('/post');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success', 'The Post was just trashed!');

        return redirect('/post');
    }
}
