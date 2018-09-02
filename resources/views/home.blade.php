@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Published Posts</h3>
            </div>
            <div class="panel-body text-center">
                <h1>{{ $posts_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Current Users</h3>
            </div>
           <div class="panel-body text-center">
               <h1> {{ $users_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Tags</h3>
            </div>
            <div class="panel-body text-center">
                <h1>{{ $tags_count }}</h1>
            </div>
        </div>
    </div>

<div class="col-md-3">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Categories</h3>
        </div>
        <div class="panel-body text-center">
            <h1>{{ $categories_count }}</h1>
        </div>
    </div>
</div>
@endsection
