@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
                    Edit Tag:
        		</div>
        		<div class="panel-body">
        			<form action="/tag/{{ $tag->id }}" method="POST" role="form">
        				{{ csrf_field() }}
                        {{ method_field('PATCH') }}
        				<div class="form-group">
        					<label for="title">Tag Name:</label>
        					<input type="text" class="form-control" id="title" name="tag" value="{{ $tag->tag }}">
        				</div>
        				<button type="submit" class="btn btn-primary">
        					<i class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 25px"></i>
                            Update Tag
        				</button>
        				
        			</form>
        		</div>
        	</div>


@endsection