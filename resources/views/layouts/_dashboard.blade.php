            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Panel:</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/home">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/profile">My Profile</a>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/post">Posts List</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/post/create">Create New Post</a>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/category">Categories List</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/category/create">Create New Category</a>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/tag">Tags List</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/tag/create">Create New Tag</a>
                        </li>
                    </ul>
                    @if (auth()->user()->admin)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="/user">Users List</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/user/create">Creat New User</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        