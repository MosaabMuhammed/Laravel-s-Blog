<?php
 namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guarded = [];


	protected static function boot()
	{
		parent::boot();

		static::deleting(function($category) {
			$category->posts->each->delete();
		});
	}

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function getRouteKeyName()
	{
		return 'name';
	}
}
