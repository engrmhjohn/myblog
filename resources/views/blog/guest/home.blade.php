@extends('blog.master')
@section('title')
    JR Blog - Guest Post
@endsection
@section('content')
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    @foreach($g_blogs as $g_blog)
                        <div><img class="highlight_img" src="{{ asset($g_blog->g_blog_image) }}"></div>
                        <div class="like_icon"><img src="{{ asset('frontEndAsset') }}/images/like-icon.png"></div>
                        <p class="post_text">Posted On: {{ $g_blog->created_at }}</p>
                        <h4>Author Name: {{ $g_blog->g_author_name }}</h4>
                        <h4>Blog Category: {{ $g_blog->g_blog_category }}</h4>
                        <h2 class="most_text" style="text-transform: capitalize;">{{ $g_blog->g_blog_title }}</h2>
                        <p class="lorem_text">{!! substr($g_blog->g_blog_description,0,200).'.......' !!}</p>
                        <div class="social_icon_main">
                            <div class="read_bt"><a href="{{ route('g-blog-details',['g_slug'=>$g_blog->g_slug]) }}">Read More</a></div>
                        </div>
                        <hr>
                        <br>
                    @endforeach
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="newsletter_main">
                        <h1 class="recent_taital">Recent post</h1>
                        <div class="recent_box">
                            @foreach($g_recents as $g_recent)
                                <div class="recent_left">
                                    <div class="image_6"><img class="recent_img" src="{{ asset($g_recent->g_blog_image) }}"></div>
                                </div>
                                <div class="recent_right mb-5">
                                    <a class="consectetur_text" href="{{ route('g-blog-details',['g_slug'=>$g_recent->g_slug]) }}">{{ $g_recent->g_blog_title }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent section end -->
    <!-- tag section start -->
    <!-- tag section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="contact_taital text-center">Send Your Blog Now...</h1>
                </div>
                <div class="col-md-12">
                    <div class="mail_section">
                        <div class="card">
                            <div class="card-header" id="g_response">
                                <h2>{{ Session('message') }}</h2>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('new-g-blog') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <label for="">Blog Title</label>
                                    <input type="text" placeholder="Blog Title" name="g_blog_title" class="form-control">
                                    <input type="hidden" name="g_slug">
                                    <label for="">Author Name</label>
                                    <input type="text" placeholder="Author Name" name="g_author_name" class="form-control">
                                    <label for="">Blog Category</label>
                                    <input type="text" placeholder="Blog Category" name="g_blog_category" class="form-control">
                                    <label for="">Blog Description </label> <br>
                                    <label for=""><strong>Length should be between 200 to 10k character. [Please set Sub-Title/Points as Heading 2 and Paragraph font size 18] To set Heading 2 press "Format Tab"</strong></label>
                                    <textarea id="editor2" cols="30" rows="10" name="g_blog_description"></textarea>
                                    <br>
                                    <label for="">Blog Image</label>
                                    <input type="file" name="g_blog_image" class="form-control">
                                    <br>
                                    <input type="submit" value="Submit Blog" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
