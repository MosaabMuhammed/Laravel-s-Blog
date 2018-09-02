@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Create A Post:
        		</div>
        		<div class="panel-body">
        			<form action="/post" method="POST" role="form" enctype="multipart/form-data">
        				{{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Category:</label>
                            <select name="category_id" id="category" class="form-control" >
                                    <option value="" selected>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Select Tags:</label>
                            <div class="checkbox">
                                @foreach ($tags as $tag)
                                    <label>
                                        <input type="checkbox" value="{{ $tag->id }}" name="tags[]">
                                        {{ $tag->tag }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
        				<div class="form-group">
        					<label for="title">Title</label>
        					<input type="text" class="form-control" id="title" name="title" placeholder="">
        				</div>
        				<div class="form-group">
        					<label for="body">Body:</label>
        					<textarea class="form-control" id="summernote" name="body" rows="3"></textarea>
        				</div>
        				<div class="form-group">
        					<input type="file" class="form-control" id="file" name="image_post" placeholder="" accept="image/*">
        				</div>
        				<div class="text-center">
	        				<button type="submit" class="btn btn-primary text-center">Submit</button>
        				</div>
        			</form>
        		</div>
        	</div>
@endsection

@section('links')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
