@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<table class="table table-hover"> 
		<thead>
			<tr>
				<th>Image</th>
				<th>User Name</th>
				<th>Permission</th>
				<th>Option</th>
			</tr>
		</thead>
		@forelse($users as $user)
			<tbody>
				<tr>
					<td>
						<img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="60" height="60" class="img-circle">
					</td>
					<td><strong>{{ $user->name }}</strong></td>
					<td>
						@if ($user->admin)
							<a href="/user/unadmin/{{ $user->id }}" class="btn btn-danger btn-xs">UnAdmin</a>
						@else 
							<a href="/user/admin/{{ $user->id }}" class="btn btn-success btn-xs">Make Admin</a>
						@endif
					</td>
					<td>
						<form action="{{ route('user.delete', $user ) }}" method="POST" role="form" style="display: inline">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" class="btn btn-danger btn-xs">Delete</button>
						</form>
					</td>
				</tr>
			</tbody>
		@empty
			<tbody>
				<tr>
					<div class="alert alert-warning text-center">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						There's no User yet!
					</div>
				</tr>
			</tbody>	
		@endforelse
	</table>
</div>@endsection