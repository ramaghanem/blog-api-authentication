<!DOCTYPE html>
<html>

<head>
    <title>{{ $post->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-sm">

            <div class="card-body">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-4">
                @endif
                <h2 class="fw-bold mb-3">
                    {{ $post->title }}
                </h2>
                <p class="text-muted">
                    By: {{ $post->user->name }}
                </p>
                <p class="text-muted">
                    {{ $post->content }}
                </p>

                <hr>

                <h6 class="mb-3">Categories:</h6>

                @foreach ($post->categories as $category)
                    <a href="/category/{{ $category->id }}" class="badge bg-dark text-decoration-none me-1">

                        {{ $category->name }}

                    </a>
                @endforeach

                <br><br>

                <a href="/" class="btn btn-outline-dark">
                    Back to Home
                </a>
                <hr>

                <h4>Comments</h4>

                @if ($post->comments->count())

                    @foreach ($post->comments as $comment)
                        <div class="card mt-3">

                            <div class="card-body">

                                <h6 class="fw-bold">
                                    {{ $comment->author_name }}
                                </h6>

                                <p class="mb-0">
                                    {{ $comment->content }}
                                </p>

                            </div>

                        </div>
                    @endforeach
                @else
                    <p class="text-muted">No comments yet.</p>

                @endif



                <h4>Add Comment</h4>

                <form action="/comments" method="POST">

                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    {{-- <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="author_name" class="form-control"  placeholder="Enter your name">
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea name="content" class="form-control" rows="4"placeholder="Write your comment..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Add Comment
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
