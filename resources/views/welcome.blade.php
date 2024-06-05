<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
</head>

<body>
    <!-- header starts -->
    <header>
        <div class='container container-flex'>
            <div class='site-title'>
                <h1>Blog The Social Life</h1>
                <p class='subtitle'>A blog exploring minimalism in life.</p>
            </div>
            <nav>
                <ul>
                    <li> <a href='{{url("/")}}' class='current-page'>Home</a> </li>
                    <li> <a href='{{url("registration")}}'>Register</a> </li>
                    <li> <a href='{{url("login")}}'>Login</a> </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- header ends -->

    <!-- container starts -->
    <div class="container container-flex">
        <main role="main">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            <!-- old -->
            @foreach ($otherDayBlogs as $blog)
            <article class="article-recent">
                <div class="article-recent-main">
                    <h2 class="article-title">{{$blog->blog_title}}</h2>
                    <p class="article-body">{{ Str::limit($blog->blog_body, 100) }}</p>
                    <a href="{{url('blog' , $blog->unique_identifier)}}" class="article-read-more">CONTINUE READING</a>
                </div>
                <div class="article-recent-secondary">
                    <img src="{{ url('fetch-images/' . $blog->blog_img) }}" alt="{{$blog->blog_title}}" class="article-image">
                    <p class="article-info">{{ \Carbon\Carbon::parse($blog->blog_post_date)->format('F d, Y') }}</p>
                </div>
            </article>
            @endforeach
        </main>

        <aside class="sidebar">

            <div class="sidebar-widget">
                <h2 class="widget-title">ABOUT ME</h2>
                <img src="https://raw.githubusercontent.com/kevin-powell/reponsive-web-design-bootcamp/master/Module%202-%20A%20simple%20life/img/about-me.jpg" alt="john doe" class="widget-image">
                <p class="widget-body">I find life better, and I'm happier, when things are nice and simple.</p>
            </div>

            <div class="sidebar-widget">
                <h2 class="widget-title">RECENT POSTS</h2>
                @foreach ($todayBlogs as $blog)
                    <div class="widget-recent-post">
                        <h3 class="widget-recent-post-title">{{$blog->blog_title}}</h3>
                        <a href="{{url('blog' , $blog->unique_identifier)}}"><img src="{{ url('fetch-images/' . $blog->blog_img) }}" alt="{{$blog->blog_title}}" class="widget-image"></a>
                    </div>
                @endforeach
            </div>

        </aside>

    </div>
    <!-- container ends -->

    <!-- footer starts -->
    <footer>
        <p><strong>Blog the Simple Life</strong></p>
        <p>Copyright 2024, <a href='#' target='_blank'>Gourav</a></p>

    </footer>
    <!-- footer ends -->

</body>
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

</html>