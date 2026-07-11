<!DOCTYPE html>
<html>

<head>
    <title>Edit Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Edit Category</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">Category Name</label>

            <input type="text" name="name" value="{{ $category->name }}" class="form-control">

        </div>

        <button class="btn btn-primary">

            Update

        </button>

    </form>

</div>

</body>

</html>
