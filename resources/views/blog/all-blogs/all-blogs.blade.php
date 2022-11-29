@extends('blog.master')
@section('title')
    JR - All Blogs
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mt-5 blog-alert">
        <div class="col-md-12 mt-5 blog-alert">
            <div class="alert alert-primary mt-1 text-center" role="alert">
                <h2>Blogs - Written by JR Bloggers</h2>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        @foreach($allblogs as $allblog)
        <div class="col-md-4 col-sm-6 mb-2">
            <div class="card" style="height: 420px;">
                <div class="card-header">
                    <img src="{{ asset($allblog->image) }}" style="height: 250px; width: 429px;" alt="">
                </div>
                <div class="card-body">
                    <h2 style="text-transform: capitalize;">{{ $allblog->blog_title }}</h2>
                    <a href="{{ route('blog-details',['slug'=>$allblog->slug]) }}" class="btn btn-outline-info">See Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        {{ $allblogs->links() }}
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary mt-1 text-center" role="alert">
                <h2>Blogs - Written by Guests</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($g_allblogs as $g_allblog)
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="card" style="height: 420px;">
                    <div class="card-header">
                        <img src="{{ asset($g_allblog->g_blog_image) }}" style="height: 250px; width: 438px;" alt="">
                    </div>
                    <div class="card-body">
                        <h2 style="text-transform: capitalize;">{{ $g_allblog->g_blog_title }}</h2>
                        {{--                    <p>{!! substr($allblog->description,0,50).'.....' !!}</p>--}}
                        <a href="{{ route('g-blog-details',['g_slug'=>$g_allblog->g_slug]) }}" class="btn btn-outline-info">See Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $g_allblogs->links() }}
    </div>
</div>
@endsection
