<?php

namespace App;

use App\Tag;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $guarded = [];
	protected $with = ['category', 'creator'];
	protected $dates = ['deleted_at'];

	public function getImagePostAttribute($image_post)
	{
		return asset($image_post);
	}
	
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function creator()
	{
		return $this->belongsTo('App\User' ,'user_id');
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}
