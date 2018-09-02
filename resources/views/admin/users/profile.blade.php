@extends('layouts.app')

@section('content')
            @include('layouts._errors')

        	<div class="panel panel-default">
        		<div class="panel-heading">
                    Edit You Credentials:
        		</div>
        		<div class="panel-body">
        			<form action="/profile/{{ $user->id }}" method="POST" role="form" enctype="multipart/form-data">
        				{{ csrf_field() }}
                        {{ method_field('PATCH') }}
        				<div class="form-group">
        					<label for="title">Username</label>
        					<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        				</div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}">
                        </div>
        				<div class="form-group">
        					<label for="body">About</label>
        					<textarea class="form-control" id="body" name="about" rows="3">{{ $user->profile->about}}</textarea>
        				</div>
                        <div class="form-group">
                            <label for="facebook">facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $user->profile->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">YouTube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $user->profile->youtube}}">
                        </div>
        				<div class="form-group">
        					<input type="file" class="form-control" id="file" name="avatar" accept="image/*">
        				</div>
        				<div class="text-center">
	        				<button type="submit" class="btn btn-primary text-center">Update Credentials</button>
        				</div>
        			</form>
        		</div>
        	</div>
@endsection
