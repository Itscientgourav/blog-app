<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
    <title>Edit Blog</title>
</head>
<body>
    <div class="container">
        <div class="title">
            <p>Edit Blog</p>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

        <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input_box">
                <label for="blog_title">Blog Title</label>
                <input type="text" id="blog_title" name="blog_title" placeholder="Enter blog title" value="{{ old('blog_title', $blog->blog_title) }}" required>
                <span class="text-danger">
                    @error('blog_title')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="input_box">
                <label for="blog_img">Blog Image</label>
                <input type="file" id="blog_img" name="blog_img">
                <span class="text-danger">
                    @error('blog_img')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <br>
            <img src="{{ url('fetch-images/' . $blog->blog_img) }}" alt="Blog Image" width="100">
            <div class="input_box">
                <label for="blog_post_date">Blog Post Date</label>
                <input type="date" id="blog_post_date" name="blog_post_date" value="{{ old('blog_post_date', $blog->blog_post_date) }}" required>
                <span class="text-danger">
                    @error('blog_post_date')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="input_box">
                <label for="blog_body">Blog Body</label>
                <textarea id="blog_body" name="blog_body" placeholder="Enter blog content" required>{{ old('blog_body', $blog->blog_body) }}</textarea>
                <span class="text-danger">
                    @error('blog_body')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="reg_btn">
                <input type="submit" value="Update Blog">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
