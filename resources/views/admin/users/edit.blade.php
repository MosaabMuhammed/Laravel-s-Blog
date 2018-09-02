@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
                    Edit a Post:
        		</div>
        		<div class="panel-body">
        			<form action="/post/{{ $post->id }}" method="POST" role="form" enctype="multipart/form-data">
        				{{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="title">Category:</label>
                            <select name="category_id" id="category" class="form-control" >
                                    <option value="" selected>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Select Tags:</label>
                            @foreach ($tags as $tag)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                            @foreach ($post->tags as $t)
                                                {{ $tag->id == $t->id ? 'checked' : '' }}
                                            @endforeach
                                        > 
                                        {{ $tag->tag }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
        				<div class="form-group">
        					<label for="title">Title</label>
        					<input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        				</div>
        				<div class="form-group">
        					<label for="body">Body:</label>
        					<textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
        				</div>
        				<div class="form-group">
        					<input type="file" class="form-control" id="file" name="image_post" accept="image/*">
        				</div>
        				<div class="text-center">
	        				<button type="submit" class="btn btn-primary text-center">Submit</button>
        				</div>
        			</form>
        		</div>
        	</div>
@endsection
