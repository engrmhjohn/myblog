@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <h1 class="mt-4">{{ Session('message') }}</h1>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Blog Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($g_blogs as $g_blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $g_blog->g_blog_title }}</td>
                            <td>{{ $g_blog->g_author_name }}</td>
                            <td>{{ $g_blog->g_blog_category }}</td>
                            <td>{!! substr($g_blog->g_blog_description,0,400).'.......' !!}</td>
                            <td><img src="{{ asset($g_blog->g_blog_image) }}" alt="" style="height: 80px; width: 80px;"></td>
                            <td>{{ $g_blog->status==0? 'Published':'Unpublished'}}</td>
                            <td>
                                @if($g_blog->status==2)
                                    <a class="btn btn-warning" href="{{ route('status-g',['id'=>$g_blog->id]) }}">Published</a>
                                @else
                                    <a class="btn btn-dark" href="{{ route('status-g',['id'=>$g_blog->id]) }}">Unpublished</a>
                                @endif
                                <a class="btn btn-info" href="{{ route('edit-g-blog',['id'=>$g_blog->id]) }}">Edit</a>
                                    <form action="{{ route('delete-g-blog') }}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" value="{{ $g_blog->id }}" name="g_blog_id">
                                        <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

