@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<table class="table table-hover"> 
		<thead>
			<tr>
				<th>Category Name</th>
				<th>Option</th>
			</tr>
		</thead>
		@forelse($categories as $category)
			<tbody>
				<tr>
					<td><strong>{{ $category->name }}</strong></td>
					<td>
						<a href="/category/{{ $category->id }}/edit" class="btn btn-success btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							Edit
						</a>
						<form action="{{ route('category.delete', $category) }}" method="POST" role="form" style="display: inline">
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
					<strong>Warning:</strong> There's no Categories Yet! 
				</div>
			</tr>
		</tbody>

		@endforelse
	</table>
</div>@endsection