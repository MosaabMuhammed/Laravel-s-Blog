@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
                    Edit Category:
        		</div>
        		<div class="panel-body">
        			<form action="/category/{{ $category->id }}" method="POST" role="form">
        				{{ csrf_field() }}
                        {{ method_field('PATCH') }}
        				<div class="form-group">
        					<label for="title">Category Name:</label>
        					<input type="text" class="form-control" id="title" name="name" value="{{ $category->name }}">
        				</div>
        				<button type="submit" class="btn btn-primary">
        					<i class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 25px"></i>
                            Update Cateogry
        				</button>
        				
        			</form>
        		</div>
        	</div>


@endsection