@extends('blog.master')
@section('title')
    John & Rakib's Blog
@endsection
@section('content')

    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url({{ asset('frontEndAsset') }}/img/sl11.jpg);">

                    </div>
                    <div class="pogoSlider-slide" style="background-image:url({{ asset('frontEndAsset') }}/img/sl12.jpg);">
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- section -->
    <div class="section tabbar_menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab_menu">
                        <ul>
                            <li><a href="https://www.facebook.com/engrmhjohn" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/images/fb.png" alt="#" /></span><span>Facebook</span></a></li>
                            <li><a href="https://www.instagram.com/m_h_j_o_h_n/" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/images/instagram.png" alt="#" /></span><span>Instagram</span></a></li>
                            <li><a href="https://twitter.com/engrmhjohn" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/images/twitter.png" alt="#" /></span><span>Twitter</span></a></li>
                            <li><a href="https://mhjohn.com/" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/img/i4.png" alt="#" /></span><span>Portfolio</span></a></li>
                            <li><a href="https://www.linkedin.com/in/engmhjohn/" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/images/linkedin.png" alt="#" /></span><span>Linkedin</span></a></li>
                            <li><a href="https://github.com/engrmhjohn" target="_blank"><span class="icon"><img src="{{ asset('frontEndAsset') }}/images/github.png" alt="#" /></span><span>Github</span></a></li>
                            <li><a href="mailto:johnsubcse@gmail.com" ><span class="icon"><img src="{{ asset('frontEndAsset') }}/img/i6.png" alt="#" /></span><span>Email</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    @foreach($blogs as $blog)
                    <div><img class="highlight_img" src="{{ asset($blog->image) }}"></div>
                    <div class="like_icon"><img src="{{ asset('frontEndAsset') }}/images/like-icon.png"></div>
                    <p class="post_text">Posted On: {{ $blog->created_at }}</p>
                    <h2>Author Name: {{ $blog->author }}</h2>
                    <h2>Blog Category: {{ $blog->category }}</h2>
                    <h2 class="most_text" style="text-transform: capitalize;">{{ $blog->blog_title }}</h2>
                    <p class="p_mob_view">{!! substr($blog->description,0,200).'.......' !!}</p>
                    <div class="social_icon_main">
                        <div class="read_bt"><a href="{{ route('blog-details',['slug'=>$blog->slug]) }}">Read More</a></div>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="newsletter_main">
                        <h1 class="recent_taital">Recent post</h1>
                        <div class="recent_box">
                            @foreach($recents as $recent)
                            <div class="recent_left">
                                <div class="image_6"><img class="recent_img" src="{{ asset($recent->image) }}"></div>
                            </div>
                            <div class="recent_right mb-5">
                                <a class="consectetur_text" href="{{ route('blog-details',['slug'=>$recent->slug]) }}">{{ $recent->blog_title }}</a>
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
@endsection
