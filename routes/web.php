<?php

// use Newsletter;

Route::get('/test', function () {
	return App\Tag::find(4)->posts;
});
Route::view('/', 'welcome');
Route::get('/result', function() {
	return view('result')->with('posts', \App\Post::where('title', 'like', '%' . request('query') . '%')->get())
						 ->with('tags', \App\Tag::all())
						 ->with('title', request('query'))
						 ->with('categories', \App\Category::all());
});
Route::post('/subscribe', function() {
	$email = request('email');

	Newsletter::subscribe($email);

	return back();
});
Route::get('/', 'FrontEndController@index')->name('welcome');
Route::get('posts/{post}', 'FrontEndController@show')->name('show.post');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/post', 'PostsController');
// Route::get('/post', 'PostsController@')
Route::delete('post/{post}/delete', 'PostsController@destroy')->name('post.delete');

Route::resource('category', 'CategoriesController');
Route::delete('category/{category}/delete', 'CategoriesController@destroy')->name('category.delete');
Route::get('category2/{category}', 'FrontEndController@showCategory');

Route::resource('tag', 'TagsController');
Route::delete('tag/{tag}/delete', 'TagsController@destroy')->name('tag.delete');

Route::resource('user', 'UsersController');
Route::delete('user/{user}/delete', 'UsersController@destroy')->name('user.delete');

Route::get('user/admin/{user}', 'AdminsController@update')->middleware('admin');
Route::get('user/unadmin/{user}', 'AdminsController@destroy')->middleware('admin');

Route::get('profile', 'ProfilesController@edit');
Route::patch('profile/{user}', 'ProfilesController@update');