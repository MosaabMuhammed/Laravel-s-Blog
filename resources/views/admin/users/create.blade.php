@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
                    Create A user:
        		</div>
        		<div class="panel-body">
        			<form action="/user" method="POST" role="form">
        				{{ csrf_field() }}
        				<div class="form-group">
        					<label for="title">UserName:</label>
        					<input type="text" class="form-control" id="name" name="name">
        				</div>
        				<div class="form-group">
        					<label for="body">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
        				</div>
        				<div class="text-center">
	        				<button type="submit" class="btn btn-primary text-center">Add User</button>
        				</div>
        			</form>
        		</div>
        	</div>
@endsection
