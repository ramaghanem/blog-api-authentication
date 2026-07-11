{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2 class="mb-4">Admin Dashboard</h2>

        <div class="row">

            <div class="col-md-3">

                <div class="card text-center shadow-sm mb-3">

                    <div class="card-body">

                        <h5>Posts</h5>

                        <h2>{{ $postsCount }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card text-center shadow-sm mb-3">

                    <div class="card-body">

                        <h5>Categories</h5>

                        <h2>{{ $categoriesCount }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card text-center shadow-sm mb-3">

                    <div class="card-body">

                        <h5>Comments</h5>

                        <h2>{{ $commentsCount }}</h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card text-center shadow-sm mb-3">

                    <div class="card-body">

                        <h5>Featured Posts</h5>

                        <h2>{{ $featuredPostsCount }}</h2>

                    </div>

                </div>

            </div>

         <div class="mt-5">

    <h3 class="mb-4">Management</h3>

    <div class="d-flex gap-3">

        <a href="/" class="btn btn-dark btn-lg px-4">
            📝 Manage Posts
        </a>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-dark btn-lg px-4">
            📂 Manage Categories
        </a>

    </div>

</div>

        </div>

    </div>

</body>

</html>
