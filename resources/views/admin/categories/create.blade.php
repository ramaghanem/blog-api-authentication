<!DOCTYPE html>
<html>

<head>
    <title>Create Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2>Create Category</h2>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Category Name</label>

            <input type="text" name="name" class="form-control">

        </div>

        <button class="btn btn-dark">

            Save

        </button>

    </form>

</div>

</body>

</html>
