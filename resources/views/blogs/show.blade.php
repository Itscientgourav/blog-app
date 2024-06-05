<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
    <title>View Blog</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <p>View Blog</p>
        </div>

        <div class="blog_details">
            <h2>{{ $blog->blog_title }}</h2>
            <img src="{{ url('fetch-images/' . $blog->blog_img) }}" alt="Blog Image" width="300">
            <p><strong>Post Date:</strong> {{ $blog->blog_post_date }}</p>
            <p>{{ $blog->blog_body }}</p>
        </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-primary">Back to Blogs</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
