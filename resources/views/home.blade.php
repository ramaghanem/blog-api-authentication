<!DOCTYPE html>
<html>

<head>
    <title>Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    @guest
        <a href="{{ route('login') }}" class="btn btn-outline-dark">Login</a>

        <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
    @endguest

    @auth

        {{-- <span class="me-3">
        Welcome, {{ Auth::user()->name }}
    </span> --}}

        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf

            <button class="btn btn-outline-danger">
                Logout
            </button>
        </form>

    @endauth

    <div class="container mt-5">

        <h1 class="text-center mb-5">Blog Posts</h1>
        <form action="/" method="GET" class="mb-4">

            <div class="input-group">

                <input type="text" name="search" class="form-control" placeholder="Search by title..."
                    value="{{ request('search') }}">

                <button class="btn btn-dark">
                    Search
                </button>

            </div>
            <br>
            @auth
                <a href="/posts/create" class="btn btn-dark">
                    + Create Post
                </a>
            @endauth
        </form>
        <h2 class="mb-4">⭐ Featured Posts</h2>

        @if ($featuredPosts->count())

            @foreach ($featuredPosts as $post)
                <div class="card mb-4 shadow-sm border-warning">

                    <div class="card-body">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                style="height:250px; object-fit:cover;">
                        @endif
                        <h3 class="card-title text-dark text-decoration-none fw-bold">

                            {{ $post->title }}

                        </h3>

                        <p class="text-muted mb-2">
                            By: {{ $post->user->name }}
                        </p>

                        <h6 class="mt-3 mb-2">Categories:</h6>

                        @foreach ($post->categories as $category)
                            <a href="/category/{{ $category->id }}" class="badge bg-dark text-decoration-none me-1">

                                {{ $category->name }}

                            </a>
                        @endforeach

                        <br><br>

                        <a href="/post/{{ $post->id }}" class="btn btn-outline-dark">
                            Read More
                        </a>

                    </div>

                </div>
            @endforeach

        @endif
        <hr>

        <h2 class="my-4">All Posts</h2>
        @foreach ($posts as $post)
            <div class="card mb-4 shadow-sm">

                <div class="card-body">


                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                            style="height:250px; object-fit:cover;">
                    @endif
                    <h3 class="card-title text-dark text-decoration-none fw-bold">

                        {{ $post->title }}

                    </h3>
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        @endif
                    @endauth
                    <p class="text-muted mb-2">
                        By: {{ $post->user->name }}
                    </p>
                    <h6 class="mt-3 mb-2">Categories:</h6>

                    @foreach ($post->categories as $category)
                        <a href="/category/{{ $category->id }}" class="badge bg-dark text-decoration-none me-1">

                            {{ $category->name }}

                        </a>
                    @endforeach

                    <br><br>

                    <a href="/post/{{ $post->id }}" class="btn btn-outline-dark">
                        Read More
                    </a>

                </div>

            </div>
        @endforeach

    </div>

</body>

</html>
