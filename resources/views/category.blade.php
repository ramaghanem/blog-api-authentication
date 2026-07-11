<!DOCTYPE html>
<html>
<head>

    <title>{{ $category->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <h1 class="mb-4">
        {{ $category->name }}
    </h1>

    @foreach($category->posts as $post)

        <div class="card mb-3">

            <div class="card-body">

                <h4>{{ $post->title }}</h4>

                <p>{{ $post->content }}</p>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>
