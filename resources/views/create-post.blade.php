<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-4">Create New Post</h2>
            

            <form action="/posts" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Content</label>

                    <textarea
                        name="content"
                        class="form-control"
                        rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>

                    <select name="category" class="form-select">

                        @foreach ($categories as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Image</label>

                    <input
                        type="file"
                        name="image"
                        class="form-control">
                </div>

                <button class="btn btn-dark">
                    Create Post
                </button>

                <a href="/" class="btn btn-outline-dark">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>

</html>
