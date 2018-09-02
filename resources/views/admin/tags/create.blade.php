@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Create A Tag:
        		</div>
        		<div class="panel-body">
        			<form action="/tag" method="POST" role="form">
        				{{ csrf_field() }}
        				<div class="form-group">
        					<label for="title">Tag Name:</label>
        					<input type="text" class="form-control" id="title" name="tag" placeholder="">
        				</div>
        				<button type="submit" class="btn btn-primary">
        					<i class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 25px"></i>
        					Add Tag
        				</button>
        				
        			</form>
        		</div>
        	</div>


@endsection