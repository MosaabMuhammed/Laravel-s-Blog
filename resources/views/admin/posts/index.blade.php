@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<table class="table table-hover"> 
		<thead>
			<tr>
				<th>Post Name</th>
				<th>Image</th>
				<th>Option</th>
			</tr>
		</thead>
		@forelse($posts as $post)
			<tbody>
				<tr>
					<td>
						<img src="{{ $post->image_post }}" alt="{{ $post->title }}" width="90" height="50">
					</td>
					<td><strong>{{ $post->title }}</strong></td>
					<td>
						<a href="/post/{{ $post->slug }}/edit" class="btn btn-success btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							Edit
						</a>
						<form action="{{ route('post.delete', $post) }}" method="POST" role="form" style="display: inline">
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
						There's no Post yet!
					</div>
				</tr>
			</tbody>	
		@endforelse
	</table>
</div>
@endsection