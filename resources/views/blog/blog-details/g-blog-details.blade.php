@extends('blog.master')
@section('title')
    JR - Blog Details
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5 blog-alert">
            <div class="col-md-9 mt-5 blog-alert">
                <div class="card">
                    <div class="card-header text-center bg-info">
                        <h1 class="text-white" style="text-transform: capitalize;">{{ ($g_blog->g_blog_title) }}</h1>
                    </div>
                    <div class="card-body">
                        <img class="highlight_img_details highlight_img_responsive" src="{{ asset($g_blog->g_blog_image) }}" alt="">
                        <p class="p_mob_view">{!! ($g_blog->g_blog_description) !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info text-center">
                        <h4 class="text-white">Author: {{ ($g_blog->g_author_name) }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Blog Category: </strong>{{ ($g_blog->g_blog_category) }}</p>
                        <p><strong>Posted On: </strong>{{ ($g_blog->created_at) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

