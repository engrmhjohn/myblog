<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('/') }}"><img src="{{ asset('frontEndAsset') }}/img/logo.png" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                <ul class="navbar-nav">
                    <li><a class="nav-link active" href="{{ route('/') }}">Home</a></li>
                    <li><a class="nav-link" href="{{ route('all-blogs') }}">All Blog</a></li>
                    <li><a class="nav-link" href="{{ route('guest') }}">Guest Post</a></li>
                    <li><a class="nav-link" href="{{ route('contact-us') }}">Get In Touch</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->


