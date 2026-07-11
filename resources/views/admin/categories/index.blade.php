<!DOCTYPE html>
<html>

<head>
    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">

        <h2>Categories</h2>

        <a href="{{ route('categories.create') }}" class="btn btn-dark">
            + Add Category
        </a>

    </div>

    <table class="table table-bordered">

        <tr>

            <th>ID</th>

            <th>Name</th>

            <th>Actions</th>

        </tr>

        @foreach($categories as $category)

        <tr>

            <td>{{ $category->id }}</td>

            <td>{{ $category->name }}</td>

            <td>

                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">

                    @csrf

                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</div>

</body>

</html>
