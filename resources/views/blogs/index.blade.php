<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/form.css') }}" rel="stylesheet">
    <title>Blogs</title>
</head>

<body>
    <div class="container">
        <div class="user-info pt-2">
            <span>Welcome , <b>{{$UserName}}</b></span>
        </div>
        <div class="title">
            <p>Blogs</p>
        </div>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
        <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
        @if (Session::has('success'))
        <div class="alert alert-success mt-3">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger mt-3">
            {{ Session::get('fail') }}
        </div>
        @endif

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Post Date</th>
                    <th>Body</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ Str::limit($blog->blog_title, 30) }}</td>
                    <td><img src="{{ url('fetch-images/' . $blog->blog_img) }}" alt="Blog Image" width="100"></td>
                    <td>{{ $blog->blog_post_date }}</td>
                    <td>{{ Str::limit($blog->blog_body, 80) }}</td>
                    <td>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ url('blogs', $blog->id) }}" class="btn btn-secondary">Show</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Find the success alert element
            var successAlert = document.querySelector('.alert-success');

            // Check if the success alert exists
            if (successAlert) {
                // Set a timeout to hide the success alert after 3 seconds
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>
</body>

</html>