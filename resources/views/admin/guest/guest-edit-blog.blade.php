@extends('admin.master')
@section('title')
    Edit Blog
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-info"><h3 class="text-center font-weight-light my-4">Update Blog Module</h3></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('update-g-blog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $g_blog->id }}" name="g_blog_id">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" type="text" name="g_blog_title" value="{{ $g_blog->g_blog_title }}" placeholder="Enter Blog Title" />
                                        <label for="inputFirstName">Blog Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" type="text" name="g_slug" value="{{ $g_blog->g_slug }}" placeholder="Enter Slug" />
                                        <label for="inputFirstName">Slug</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" name="g_author_name" value="{{ $g_blog->g_author_name }}" placeholder="Enter Author Name" />
                                                <label for="inputFirstName">Author Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" type="text" name="g_blog_category" value="{{ $g_blog->g_blog_category }}" placeholder="Enter Category" />
                                                <label for="inputFirstName">Category</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <label for=""><strong>Length should be between 200 to 10k character. [Please set Sub-Title/Points as Heading 1 and Paragraph font size 16 or lower] To set Heading 1 press "Format Tab"</strong></label>
                                            <br> <br>
                                            <textarea id="editor1" name="g_blog_description" cols="30" rows="10">{{ $g_blog->g_blog_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="file" name="image" />
                                            <img src="{{ asset($g_blog->g_blog_image) }}" alt="" style="height: 50px; width: 50px">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-0">
                                    <input class="form-control btn btn-success" type="submit" value="Update This Blog">
                                </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <a class="form-control btn btn-info" href="{{ route('guest-manage-blog') }}">Go to Manage Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


