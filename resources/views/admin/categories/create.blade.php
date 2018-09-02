@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Create A Category:
        		</div>
        		<div class="panel-body">
        			<form action="/category" method="POST" role="form">
        				{{ csrf_field() }}
        				<div class="form-group">
        					<label for="title">Category Name:</label>
        					<input type="text" class="form-control" id="title" name="name" placeholder="">
        				</div>
        				<button type="submit" class="btn btn-primary">
        					<i class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 25px"></i>
        					Add Category
        				</button>
        				
        			</form>
        		</div>
        	</div>


@endsection