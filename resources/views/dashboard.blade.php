@extends('home')

@section('content')
            <div class="panel panel-default">
             <div class="panel-heading">dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                Welcome to your Dashboard!
                </div>
            </div>
        </div>
@endsection